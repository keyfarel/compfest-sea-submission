<?php

namespace App\Livewire\Admin;

use App\Models\SubscriptionModel;
use App\Models\SubscriptionStatusHistoryModel;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.dashboard.admin.app')]
#[Title('Admin Dashboard - SEA Catering')]
class Dashboard extends Component
{
    public $startDate;
    public $endDate;

    public float $revenueThisMonth = 0;
    public int $newSubscriptionsCount = 0;
    public int $totalActiveSubscriptions = 0;
    public int $reactivationsCount = 0;
    public $recentSubscriptions = [];

    public $lastChartJsDataHash = null;

    private $chartJsData = ['labels' => [], 'values' => []];
    private $isUpdatingChart = false;

    public function mount()
    {
        $this->setPeriod('this_month', true);
    }

    public function loadInfoCardData()
    {
        $start = Carbon::parse($this->startDate)->startOfDay();
        $end = Carbon::parse($this->endDate)->endOfDay();

        $this->revenueThisMonth = SubscriptionModel::whereBetween('created_at', [$start, $end])->sum('monthly_total_price');
        $this->newSubscriptionsCount = SubscriptionModel::whereBetween('created_at', [$start, $end])->count();
        $this->totalActiveSubscriptions = SubscriptionModel::where('latest_status', 'aktif')->count();
        $this->reactivationsCount = SubscriptionStatusHistoryModel::where('status', 'aktif')
            ->where('notes', 'like', '%diaktifkan kembali%')
            ->whereBetween('created_at', [$start, $end])
            ->count();
        $this->recentSubscriptions = SubscriptionModel::with('user', 'plan')->latest()->take(5)->get();
    }

    public function generateChartJsData($periodFilter)
    {
        $start = Carbon::parse($this->startDate)->startOfDay();
        $end = Carbon::parse($this->endDate)->endOfDay();

        switch ($periodFilter) {
            case 'today':
                $period = CarbonPeriod::create($start, '1 hour', $end);
                $labelFormat = 'H:i';
                $dbFormat = '%H:00';
                $lookupFormat = 'H:00';
                break;

            case 'last_7_days':
            case 'last_30_days':
            case 'this_month':
                $period = CarbonPeriod::create($start, '1 day', $end);
                $labelFormat = 'd M';
                $dbFormat = '%Y-%m-%d';
                $lookupFormat = 'Y-m-d';
                break;

            case 'this_year':
                $period = CarbonPeriod::create($start->copy()->startOfMonth(), '1 month', $end);
                $labelFormat = 'M Y';
                $dbFormat = '%Y-%m';
                $lookupFormat = 'Y-m';
                break;

            default:
                $period = CarbonPeriod::create($start, '1 day', $end);
                $labelFormat = 'd M';
                $dbFormat = '%Y-%m-%d';
                $lookupFormat = 'Y-m-d';
                break;
        }

        $data = SubscriptionModel::select(
            DB::raw('COUNT(id) as count'),
            DB::raw("DATE_FORMAT(created_at, '$dbFormat') as date_label")
        )
            ->whereBetween('created_at', [$start, $end])
            ->groupBy('date_label')
            ->orderByRaw('MIN(created_at)')
            ->get()
            ->keyBy('date_label');

        $chartData = [];
        foreach ($period as $date) {
            $lookupKey = $date->format($lookupFormat);
            $chartData[] = [
                'label' => $date->format($labelFormat),
                'value' => $data->get($lookupKey)?->count ?? 0,
            ];
        }

        $this->chartJsData = [
            'labels' => array_column($chartData, 'label'),
            'values' => array_column($chartData, 'value'),
        ];
    }

    public function getChartData()
    {
        return $this->chartJsData;
    }

    public function setPeriod($period, $isInitialLoad = false)
    {
        if ($this->isUpdatingChart) {
            return;
        }

        $this->isUpdatingChart = true;

        $this->endDate = now()->format('Y-m-d');
        switch ($period) {
            case 'today':
                $this->startDate = now()->format('Y-m-d');
                break;
            case 'last_7_days':
                $this->startDate = now()->subDays(6)->format('Y-m-d');
                break;
            case 'last_30_days':
                $this->startDate = now()->subDays(29)->format('Y-m-d');
                break;
            case 'this_month':
                $this->startDate = now()->startOfMonth()->format('Y-m-d');
                break;
            case 'this_year':
                $this->startDate = now()->startOfYear()->format('Y-m-d');
                break;
        }

        $this->loadInfoCardData();
        $this->generateChartJsData($period);

        if (!$isInitialLoad) {
            if ($this->shouldDispatchChartUpdate($this->chartJsData)) {
                $this->dispatch('chart-updated', data: $this->chartJsData);
            }
        } else {
            $this->lastChartJsDataHash = $this->getChartDataHash($this->chartJsData);
        }

        $this->resetUpdateFlag();
    }

    public function shouldDispatchChartUpdate($newData): bool
    {
        $newHash = $this->getChartDataHash($newData);

        if ($this->lastChartJsDataHash !== $newHash) {
            $this->lastChartJsDataHash = $newHash;
            return true;
        }

        return false;
    }

    private function getChartDataHash($data): string
    {
        return md5(json_encode($data));
    }

    public function resetUpdateFlag()
    {
        $this->isUpdatingChart = false;
    }

    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}

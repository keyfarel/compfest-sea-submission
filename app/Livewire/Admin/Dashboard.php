<?php

namespace App\Livewire\Admin;

use App\Models\SubscriptionModel;
use App\Models\SubscriptionStatusHistoryModel;
use Carbon\Carbon;
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

    public array $chartData = [];
    public $recentSubscriptions = [];

    public function mount()
    {
        $this->endDate = now()->format('Y-m-d');
        $this->startDate = now()->subDays(29)->format('Y-m-d');
        $this->loadDashboardData();
    }

    public function loadDashboardData()
    {
        $start = Carbon::parse($this->startDate)->startOfDay();
        $end = Carbon::parse($this->endDate)->endOfDay();

        $this->revenueThisMonth = SubscriptionModel::whereBetween('created_at', [$start, $end])
            ->sum('monthly_total_price');

        $this->newSubscriptionsCount = SubscriptionModel::whereBetween('created_at', [$start, $end])->count();

        $this->totalActiveSubscriptions = SubscriptionModel::where('latest_status', 'aktif')->count();

        $this->reactivationsCount = SubscriptionStatusHistoryModel::where('status', 'aktif')
            ->where('notes', 'like', '%diaktifkan kembali%')
            ->whereBetween('created_at', [$start, $end])
            ->count();

        $this->prepareChartData();

        $this->recentSubscriptions = SubscriptionModel::with('user', 'plan')
            ->latest()
            ->take(5)
            ->get();
    }

    public function setPeriod($period)
    {
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
        $this->loadDashboardData();
    }

    private function prepareChartData()
    {
        $data = SubscriptionModel::select(
            DB::raw('COUNT(id) as count'),
            DB::raw("DATE_FORMAT(created_at, '%b') as month_name"),
            DB::raw('MONTH(created_at) as month_number')
        )
            ->where('created_at', '>=', now()->subMonths(5)->startOfMonth())
            ->groupBy('month_name', 'month_number')
            ->orderBy('month_number')
            ->get()
            ->keyBy('month_name');

        $this->chartData = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = now()->subMonths($i);
            $monthName = $month->format('M');
            $this->chartData[] = [
                'label' => $monthName,
                'value' => $data->get($monthName)->count ?? 0,
            ];
        }
    }

    public function updated($property)
    {
        if (in_array($property, ['startDate', 'endDate'])) {
            $this->loadDashboardData();
        }
    }

    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}

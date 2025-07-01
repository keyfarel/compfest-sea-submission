<?php

namespace App\Livewire\Pages\Subscription;

use App\Models\DeliveryDayModel;
use App\Models\MealTypeModel;
use App\Models\PlanModel;
use App\Models\SubscriptionModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CreateSubscription extends Component
{
    public $fullName = '';
    public $phoneNumber = '';
    public $allergies = '';
    public $selectedPlan = null;
    public $mealTypes = [];
    public $deliveryDays = [];

    public $plans = [];
    public $allMealTypes = [];
    public $allDeliveryDays = [];

    protected function rules()
    {
        return [
            'fullName' => 'required|string|min:3',
            'phoneNumber' => ['required', 'regex:/^\d{3,20}$/'],
            'selectedPlan' => ['required', Rule::exists('plans', 'slug')],
            'mealTypes' => 'required|array|min:1',
            'mealTypes.*' => Rule::exists('meal_types', 'id'),
            'deliveryDays' => 'required|array|min:1',
            'deliveryDays.*' => Rule::exists('delivery_days', 'id'),
            'allergies' => 'nullable|string|max:300',
        ];
    }

    protected function messages()
    {
        return [
            'fullName.required' => 'Nama lengkap wajib diisi.',
            'fullName.string' => 'Nama lengkap harus berupa teks.',
            'fullName.min' => 'Nama lengkap minimal harus terdiri dari 3 karakter.',
            'phoneNumber.required' => 'Nomor telepon wajib diisi.',
            'phoneNumber.regex' => 'Nomor telepon harus terdiri dari 3 hingga 20 digit angka.',
            'selectedPlan.required' => 'Silakan pilih salah satu paket langganan.',
            'selectedPlan.exists' => 'Paket langganan yang dipilih tidak ditemukan.',
            'mealTypes.required' => 'Silakan pilih minimal satu jenis makanan.',
            'mealTypes.array' => 'Data jenis makanan tidak valid.',
            'mealTypes.*.exists' => 'Jenis makanan yang dipilih tidak tersedia.',
            'deliveryDays.required' => 'Silakan pilih minimal satu hari pengantaran.',
            'deliveryDays.array' => 'Data hari pengantaran tidak valid.',
            'deliveryDays.*.exists' => 'Hari pengantaran yang dipilih tidak tersedia.',
            'allergies.string' => 'Keterangan alergi harus berupa teks.',
            'allergies.max' => 'Keterangan alergi maksimal 300 karakter.',
        ];
    }

    public function mount()
    {
        $this->plans = PlanModel::all()->keyBy('slug');
        $this->allMealTypes = MealTypeModel::all();
        $this->allDeliveryDays = DeliveryDayModel::orderBy('day_of_week')->get();

        if (Auth::check()) {
            $this->fullName = Auth::user()->name;
            $this->phoneNumber = Auth::user()->phone_number;
        }

        $this->calculateAndDispatchSummary();
    }

    public function updated($property)
    {
        if (in_array($property, ['selectedPlan', 'mealTypes', 'deliveryDays'])) {
            $this->validateOnly($property);
            $this->calculateAndDispatchSummary();
        }
    }

    public function calculateAndDispatchSummary()
    {
        if (empty($this->selectedPlan) || empty($this->mealTypes) || empty($this->deliveryDays) || !isset($this->plans[$this->selectedPlan])) {
            $this->dispatch('summaryUpdated', ['totalPrice' => 0]);
            return;
        }

        $plan = $this->plans[$this->selectedPlan];
        $mealCount = count($this->mealTypes);
        $dayCount = count($this->deliveryDays);
        $totalPrice = $plan->price * $mealCount * $dayCount * 4.3;

        $this->dispatch('summaryUpdated', [
            'planName' => $plan->name,
            'planPrice' => $plan->price,
            'mealCount' => $mealCount,
            'dayCount' => $dayCount,
            'totalPrice' => $totalPrice,
        ]);
    }

    public function submit()
    {
        if (Auth::guest()) {
            session()->flash('info', 'Anda harus login terlebih dahulu untuk berlangganan. Redirecting now...');
            $this->js("setTimeout(() => { Livewire.navigate('" . route('login') . "'); }, 2000);");
            return;
        }
        
        if (Auth::user()->role_id == 1) {
            session()->flash('error', 'Maaf, Administrator tidak dapat melakukan subscribe.');
            return;
        }

        $validatedData = $this->validate();
        $plan = $this->plans[$this->selectedPlan];
        $mealCount = count($validatedData['mealTypes']);
        $dayCount = count($validatedData['deliveryDays']);
        $totalPrice = $plan->price * $mealCount * $dayCount * 4.3;

        try {
            DB::transaction(function () use ($validatedData, $plan, $totalPrice) {
                $subscription = SubscriptionModel::create([
                    'user_id' => Auth::id(),
                    'plan_id' => $plan->id,
                    'full_name' => $validatedData['fullName'],
                    'phone_number' => $validatedData['phoneNumber'],
                    'allergies' => $validatedData['allergies'] ?? 'Tidak ada',
                    'monthly_total_price' => $totalPrice,
                    'start_date' => now()->addDay(),
                ]);

                $subscription->statusHistories()->create([
                    'status' => 'pending',
                    'notes' => 'Langganan baru dibuat oleh user.'
                ]);

                $subscription->mealTypes()->attach($validatedData['mealTypes']);
                $subscription->deliveryDays()->attach($validatedData['deliveryDays']);
            });
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan saat menyimpan pesanan. Silakan coba lagi.');
            return;
        }

        session()->flash('success', 'Pesanan langganan Anda berhasil dibuat! Mohon segera selesaikan pembayaran.');
        $this->reset(['fullName', 'phoneNumber', 'allergies', 'selectedPlan', 'mealTypes', 'deliveryDays']);
        $this->mount();
    }

    public function render()
    {
        return view('livewire.pages.subscription.create-subscription');
    }
}

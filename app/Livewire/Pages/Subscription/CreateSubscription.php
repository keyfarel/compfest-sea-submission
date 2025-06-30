<?php

namespace App\Livewire\Pages\Subscription;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateSubscription extends Component
{
    public $fullName = '';
    public $phoneNumber = '';
    public $allergies = '';
    public $plans = [];
    public $selectedPlan = null;
    public $mealTypes = [];
    public $deliveryDays = [];

    protected $rules = [
        'fullName' => 'required|string|min:3',
        'phoneNumber' => 'required|string|numeric',
        'selectedPlan' => 'required|in:diet,protein,royal',
        'mealTypes' => 'required|array|min:1',
        'deliveryDays' => 'required|array|min:1',
        'allergies' => 'nullable|string',
    ];

    public function mount()
    {
        $this->plans = [
            'diet' => [
                'name' => 'Diet Plan',
                'price' => 30000,
                'description' => 'Low-calorie meals designed for weight management',
            ],
            'protein' => [
                'name' => 'Protein Plan',
                'price' => 40000,
                'description' => 'High-protein meals ideal for active lifestyles',
            ],
            'royal' => [
                'name' => 'Royal Plan',
                'price' => 60000,
                'description' => 'Premium gourmet meals with exclusive ingredients',
            ],
        ];

        // Memastikan summary dihitung saat komponen pertama kali dimuat
        $this->calculateAndDispatchSummary();
    }

    /**
     * Hook ini akan otomatis terpanggil setiap kali ada perubahan pada properti.
     */
    public function updated($property)
    {
        // Hanya jalankan kalkulasi jika properti yang berubah adalah salah satu dari pilihan ini.
        if (in_array($property, ['selectedPlan', 'mealTypes', 'deliveryDays'])) {
            $this->calculateAndDispatchSummary();
        }
    }

    /**
     * Fungsi untuk menghitung total dan mengirim event.
     */
    public function calculateAndDispatchSummary()
    {
        // Guard clause untuk memastikan semua data yang diperlukan sudah terisi.
        if (empty($this->selectedPlan) || empty($this->mealTypes) || empty($this->deliveryDays)) {
            $this->dispatch('summaryUpdated', [
                'planName'   => null,
                'planPrice'  => 0,
                'mealCount'  => 0,
                'dayCount'   => 0,
                'totalPrice' => 0,
            ]);
            return;
        }

        // Lanjutkan kalkulasi jika semua data valid.
        $planPrice = $this->plans[$this->selectedPlan]['price'];
        $planName = $this->plans[$this->selectedPlan]['name'];
        $mealCount = count($this->mealTypes);
        $dayCount = count($this->deliveryDays);
        $totalPrice = $planPrice * $mealCount * $dayCount * 4.3; // Rata-rata minggu dalam sebulan

        // Kirim data yang sudah dihitung ke listener
        $this->dispatch('summaryUpdated', [
            'planName'   => $planName,
            'planPrice'  => $planPrice,
            'mealCount'  => $mealCount,
            'dayCount'   => $dayCount,
            'totalPrice' => $totalPrice,
        ]);
    }

    public function submit()
    {
        if (Auth::guest()) {
            session()->flash('info', 'Anda harus login terlebih dahulu untuk berlangganan. Kami akan mengalihkan Anda...');

            // Redirect ke halaman login setelah 3 detik
            $this->js("setTimeout(() => { Livewire.navigate('" . route('login') . "'); }, 3000)");
            return;
        }

        // 2. Cek jika pengguna adalah admin (misal: role_id = 1)
        if (Auth::user()->role_id == 1) {
            session()->flash('error', 'Maaf, Administrator tidak dapat melakukan subscribe.');
            return;
        }

        // 3. Jika bukan guest atau admin, lanjutkan validasi
        // Rules 'fullName' & 'phoneNumber' bisa dibuat kondisional jika data bisa diambil dari user yg login
        $validatedData = $this->validate();
        // Logika untuk menyimpan data ke database...

        session()->flash('success', 'Your subscription has been placed successfully!');
        $this->reset();
        $this->calculateAndDispatchSummary();
    }

    public function render()
    {
        return view('livewire.pages.subscription.create-subscription');
    }
}

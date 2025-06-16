<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Computed;

class WelcomeDashboard extends Component
{
    public string $currentTime;
    public int $currentLevel = 1;
    public array $tasks = [];
    public int $highestLevelReached = 1;
    public bool $allLevelsCompleted = false;

    public function mount()
    {
        $this->currentTime = Carbon::now()->toDateTimeString();
        // ... (isi array $tasks tetap sama seperti sebelumnya)
        $this->tasks = [
            1 => [
                ['text' => 'Buat struktur layout utama (Header, Content, Footer)', 'completed' => false],
                ['text' => 'Buat halaman Homepage (Section welcoming, fitur, kontak)', 'completed' => false],
            ],
            2 => [
                ['text' => 'Buat Navigasi Interaktif', 'completed' => false],
                ['text' => 'Buat Tampilan Meal Plan Interaktif dengan Modal', 'completed' => false],
                ['text' => 'Buat Bagian Testimoni dengan Form & Slider', 'completed' => false],
            ],
            3 => [
                ['text' => 'Buat Form Langganan dengan Kalkulasi Harga', 'completed' => false],
                ['text' => 'Buat dan Integrasikan Database', 'completed' => false],
            ],
            4 => [
                ['text' => 'Implementasi Autentikasi & Otorisasi Pengguna', 'completed' => false],
                ['text' => 'Implementasi Validasi & Sanitasi Input (Anti XSS, SQL Injection)', 'completed' => false],
            ],
            5 => [
                ['text' => 'Buat Dashboard Pengguna (View, Pause, Cancel)', 'completed' => false],
                ['text' => 'Buat Dashboard Admin dengan Metrik Bisnis', 'completed' => false],
            ]
        ];
    }

    #[Computed]
    public function isCurrentLevelComplete(): bool
    {
        if (!isset($this->tasks[$this->currentLevel])) {
            return true;
        }
        foreach ($this->tasks[$this->currentLevel] as $task) {
            if ($task['completed'] === false) {
                return false;
            }
        }
        return true;
    }

    public function nextLevel()
    {
        if ($this->isCurrentLevelComplete && $this->currentLevel < 5) {
            $this->currentLevel++;
            // Update level tertinggi jika level saat ini melampauinya
            if ($this->currentLevel > $this->highestLevelReached) {
                $this->highestLevelReached = $this->currentLevel;
            }
            unset($this->isCurrentLevelComplete);
        }
    }

    public function previousLevel()
    {
        if ($this->currentLevel > 1) {
            $this->currentLevel--;
            unset($this->isCurrentLevelComplete);
        }
    }

    public function finish()
    {
        if ($this->currentLevel == 5 && $this->isCurrentLevelComplete) {
            $this->allLevelsCompleted = true;
        }
    }

    public function refreshTime()
    {
        $this->currentTime = Carbon::now()->toDateTimeString();
    }

    public function render()
    {
        return view('livewire.welcome-dashboard')->title('Project Launchpad');
    }
}

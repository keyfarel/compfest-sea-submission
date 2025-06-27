<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.auth.app')] // Pastikan path layout ini benar
#[Title('Login - SEA Catering')]
class Login extends Component
{
    // Properti untuk menampung data dari form
    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    // Aturan validasi
    protected function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    // Fungsi utama yang dijalankan saat form di-submit
    public function login()
    {
        $credentials = $this->validate();

        if (Auth::attempt($credentials, $this->remember)) {
            request()->session()->regenerate();

            $user = Auth::user();

            // Cek role_id dan arahkan ke dashboard yang sesuai
            if ($user->role_id === 1) {
                return $this->redirect(route('admin-dashboard'), navigate: true);
            } elseif ($user->role_id === 2) {
                return $this->redirect(route('user-dashboard'), navigate: true);
            } else {
                Auth::logout(); // Jika role tidak valid, logout
                $this->addError('email', 'Akun Anda tidak memiliki hak akses yang valid.');
            }
        }

        $this->addError('email', 'Email atau password yang Anda masukkan salah.');
    }

    public function mount()
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Redirect otomatis jika sudah login
            if ($user->role_id === 1) {
                return redirect()->route('admin-dashboard');
            } elseif ($user->role_id === 2) {
                return redirect()->route('user-dashboard');
            }
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}

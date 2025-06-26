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
        // Validasi input
        $credentials = $this->validate();

        // Coba untuk melakukan autentikasi
        if (Auth::attempt($credentials, $this->remember)) {
            // Jika berhasil, regenerate session untuk keamanan
            request()->session()->regenerate();

            // Redirect ke halaman home seperti yang diminta
            return $this->redirect(route('home'), navigate: true);
        }

        // Jika gagal, tambahkan pesan error ke field 'email'.
        // Pesan ini hanya akan muncul jika email/password tidak cocok.
        $this->addError('email', 'Email atau password yang Anda masukkan salah.');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}

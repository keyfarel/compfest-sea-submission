<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.auth.app')]
#[Title('Login - SEA Catering')]
class Login extends Component
{
    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    protected array $messages = [
        // Email field
        'email.required' => 'Email wajib diisi.',
        'email.email'    => 'Format email tidak valid.',
        'email.max'      => 'Email tidak boleh lebih dari 255 karakter.',

        // Password field
        'password.required' => 'Password wajib diisi.',
        'password.min'      => 'Password minimal terdiri dari 8 karakter.',
    ];

    protected function rules(): array
    {
        return [
            'email' => [
                'required',
                'string',
                'email:filter',
                'max:255',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
            ],
        ];
    }


    public function login()
    {
        $credentials = $this->validate();

        if (Auth::attempt($credentials, $this->remember)) {
            request()->session()->regenerate();

            $user = Auth::user();

            if ($user->role_id === 1) {
                return $this->redirect(route('admin-dashboard'), navigate: true);
            } elseif ($user->role_id === 2) {
                return $this->redirect(route('user-dashboard'), navigate: true);
            } else {
                Auth::logout();
                $this->addError('email', 'Akun Anda tidak memiliki hak akses yang valid.');
            }
        }

        $this->addError('credentials', 'Email atau password yang Anda masukkan salah.');
    }

    public function mount()
    {
        if (Auth::check()) {
            $user = Auth::user();
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

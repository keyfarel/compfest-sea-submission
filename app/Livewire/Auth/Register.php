<?php

namespace App\Livewire\Auth;

use App\Models\RoleModel;
use App\Models\UserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Exception;

#[Layout('components.layouts.auth.app')]
#[Title('Register - SEA Catering')]
class Register extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    protected function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'unique:m_user,name',
            ],
            'email' => [
                'required',
                'string',
                'email:filter',
                'max:255',
                'unique:m_user,email',
            ],
            'password' => [
                'required',
                'string',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->numbers()
                    ->symbols(),
            ],
        ];
    }

    protected function messages(): array
    {
        return [
            'name.unique' => 'Nama tersebut sudah terdaftar.',
            'email.unique' => 'Email tersebut sudah terdaftar.',
            'password.min' => 'Password harus terdiri dari minimal 8 karakter.',
            'password.letters' => 'Password harus mengandung setidaknya satu huruf.',
            'password.numbers' => 'Password harus mengandung setidaknya satu angka.',
            'password.symbols' => 'Password harus mengandung setidaknya satu simbol.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ];
    }


    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function register()
    {
        $validated = $this->validate();

        try {
            $userRole = RoleModel::where('name', 'user')->first();

            if (!$userRole) {
                session()->flash('error', 'Konfigurasi role pengguna tidak ditemukan. Silakan hubungi administrator.');
                return;
            }

            $user = UserModel::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role_id' => $userRole->id,
            ]);

            session()->flash('success', 'Pendaftaran Anda berhasil! Mengarahkan ke halaman utama...');

            return $this->redirect(route('login'), navigate: true);

        } catch (Exception $e) {
            session()->flash('error', 'Terjadi kesalahan pada server. Silakan coba lagi beberapa saat.');
        }
    }


    public function render()
    {
        return view('livewire.auth.register');
    }
}

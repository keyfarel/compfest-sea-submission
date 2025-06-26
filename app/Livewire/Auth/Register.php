<?php

namespace App\Livewire\Auth;

use App\Models\RoleModel;
use App\Models\UserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:m_user,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
                // Tampilkan pesan error server
                session()->flash('error', 'Konfigurasi role pengguna tidak ditemukan. Silakan hubungi administrator.');
                return;
            }

            $user = UserModel::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role_id' => $userRole->id,
            ]);

            Auth::login($user);

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

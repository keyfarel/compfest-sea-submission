<?php

namespace App\Livewire\Admin\ManageUsers;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\UserModel;
use App\Models\RoleModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Log;

class EditUser extends Component
{
    public bool $showEditModal = false;
    public array $editingUser = ['role' => null];
    public string $password = '';
    public string $password_confirmation = '';
    public array $allRoles = [];

    #[On('load-user-to-edit')]
    public function loadUser(int $userId)
    {
        $user = UserModel::with('role')->find($userId);
        if (!$user) {
            return;
        }

        $this->reset();
        $this->allRoles = RoleModel::pluck('name', 'id')->toArray();
        $this->editingUser = $user->toArray();
        $this->editingUser['role'] = ucfirst($user->role?->name ?? 'Tanpa Peran');
        $this->showEditModal = true;
    }

    protected function messages(): array
    {
        return [
            'editingUser.name.required' => 'Nama lengkap wajib diisi.',
            'editingUser.name.min' => 'Nama lengkap minimal harus 3 karakter.',
            'editingUser.email.required' => 'Alamat email wajib diisi.',
            'editingUser.email.email' => 'Format alamat email tidak valid.',
            'editingUser.email.unique' => 'Alamat email ini sudah terdaftar oleh pengguna lain.',
            'editingUser.role_id.required' => 'Peran pengguna wajib dipilih.',
            'editingUser.role_id.exists' => 'Peran yang dipilih tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal harus 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.letters' => 'Password harus mengandung setidaknya satu huruf.',
            'password.numbers' => 'Password harus mengandung setidaknya satu angka.',
            'password.symbols' => 'Password harus mengandung setidaknya satu simbol.',
            'password.regex' => 'Password harus mengandung setidaknya satu huruf besar dan satu huruf kecil.',
            'password.regex:/[A-Z]/' => 'Password harus mengandung setidaknya satu huruf besar.',
            'password.regex:/[a-z]/' => 'Password harus mengandung setidaknya satu huruf kecil.',
        ];
    }

    public function updateUser()
    {
        $this->allRoles = RoleModel::pluck('name', 'id')->toArray();
        $roleNameToId = array_flip($this->allRoles);
        $roleNameFromInput = $this->editingUser['role'] ?? null;

        if ($roleNameFromInput) {
            $this->editingUser['role_id'] = $roleNameToId[strtolower($roleNameFromInput)] ?? null;
        }

        $rules = [
            'editingUser.name' => 'required|string|min:3|max:255',
            'editingUser.email' => 'required|email|unique:m_user,email,' . ($this->editingUser['id'] ?? 'null'),
            'editingUser.role_id' => 'required|integer|exists:m_role,id',
        ];

        if (!empty($this->password)) {
            $rules['password'] = [
                'required',
                'string',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->mixedCase(),
                'regex:/[A-Z]/',
                'regex:/[a-z]/',
            ];
        }

        $validated = $this->validate($rules, $this->messages());

        try {
            $updateData = [
                'name' => $validated['editingUser']['name'],
                'email' => $validated['editingUser']['email'],
                'role_id' => $validated['editingUser']['role_id'],
            ];

            if (!empty($validated['password'])) {
                $updateData['password'] = Hash::make($validated['password']);
            }

            $user = UserModel::find($this->editingUser['id']);
            if ($user) {
                $user->update($updateData);
                session()->flash('success', 'Data pengguna berhasil diperbarui.');
                $this->js('setTimeout(() => { window.location.reload(); }, 2000)');
            }

        } catch (\Exception $e) {
            Log::error('Gagal update pengguna: ' . $e->getMessage());
            session()->flash('error', 'Gagal memperbarui data. Silakan coba lagi.');
        }
    }

    public function closeModal()
    {
        $this->showEditModal = false;
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.admin.manage-users.edit-user');
    }
}

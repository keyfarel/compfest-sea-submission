<?php

namespace App\Livewire\Admin\ManageUsers;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\UserModel;
use Illuminate\Support\Facades\Auth;

class DeleteUser extends Component
{
    public bool $showDeleteModal = false;

    public ?int $userIdToDelete = null;
    public string $userNameToDelete = '';

    #[On('launch-delete-modal')]
    public function launchDeleteModal(array $userData)
    {
        $this->userIdToDelete = $userData['id'];
        $this->userNameToDelete = $userData['name'] ?? 'Pengguna tidak ditemukan';
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        if ($this->userIdToDelete) {
            if ($this->userIdToDelete === Auth::id()) {
                session()->flash('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
                return; // Jangan closeModal
            }

            $user = UserModel::find($this->userIdToDelete);
            if ($user) {
                $hasRelations = $user->testimonials()->exists();

                if ($hasRelations) {
                    session()->flash('error', 'Pengguna ini tidak dapat dihapus karena memiliki data terkait.');
                    return; // Jangan closeModal
                } else {
                    $user->delete();
                    session()->flash('success', 'Pengguna berhasil dihapus!');
                    $this->dispatch('userDeleted');
                    $this->js('setTimeout(() => { window.location.reload(); }, 3000);');
                    $this->closeModal();
                }
            }
        }
    }


    public function closeModal()
    {
        $this->showDeleteModal = false;
        $this->reset(['userIdToDelete', 'userNameToDelete']);
    }

    public function render()
    {
        return view('livewire.admin.manage-users.delete-user');
    }
}

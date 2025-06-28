<?php

namespace App\Livewire\Admin\ManageUsers;

use Livewire\Component;
use Livewire\Attributes\On;

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
        $this->showDeleteModal = false;
        $this->dispatch('userDeleted');
    }

    public function render()
    {
        return view('livewire.admin.manage-users.delete-user');
    }
}

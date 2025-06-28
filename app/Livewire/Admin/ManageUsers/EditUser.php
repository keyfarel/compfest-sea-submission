<?php

namespace App\Livewire\Admin\ManageUsers;

use Livewire\Component;
use Livewire\Attributes\On;

class EditUser extends Component
{
    public bool $showEditModal = false;
    public array $editingUser = [];


    #[On('edit-user')]
    public function editUser(array $userData)
    {
        $this->editingUser = $userData;
        $this->showEditModal = true;
    }


    public function updateUser()
    {
        $this->showEditModal = false;
        $this->dispatch('userUpdated');
    }

    public function render()
    {
        return view('livewire.admin.manage-users.edit-user');
    }
}

<?php

namespace App\Livewire\Admin\ManageUsers;

use App\Livewire\Admin\ManageUsers\EditUser as EditUserComponent;
use Livewire\Component;

class ShowUser extends Component
{
    public array $user;
    public int $loopIndex;
    public int $currentPage;
    public int $perPage;

    public function getRowIndexProperty(): int
    {
        return (($this->currentPage - 1) * $this->perPage) + $this->loopIndex + 1;
    }

    public function requestUserEdit()
    {
        $this->dispatch('load-user-to-edit', userId: $this->user['id'])->to(EditUserComponent::class);
    }

    public function requestUserDeletion()
    {
        $this->dispatch('launchDeleteModal', userId: $this->user['id']);
    }

    public function render()
    {
        return view('livewire.admin.manage-users.show-user', [
            'rowIndex' => $this->rowIndex,
        ]);
    }
}

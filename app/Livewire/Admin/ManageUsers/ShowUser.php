<?php

namespace App\Livewire\Admin\ManageUsers;

use Livewire\Component;
use Livewire\Attributes\Reactive;

class ShowUser extends Component
{
    #[Reactive]
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
        $this->dispatch('launchEditModal', userId: $this->user['id']);
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

<?php

namespace App\Livewire\Admin\ManageUsers;

use Livewire\Component;
use Livewire\Attributes\Reactive; // <-- 1. IMPORT ATTRIBUTE REACTIVE

class ShowUser extends Component
{
    // 2. TAMBAHKAN ATTRIBUTE #[Reactive] DI SINI
    #[Reactive]
    public array $user;

    public int $index;

    // Method mount tidak perlu diubah, Livewire akan menanganinya secara otomatis
    public function mount(array $user, int $index)
    {
        $this->user = $user;
        $this->index = $index;
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
        return view('livewire.admin.manage-users.show-user');
    }
}

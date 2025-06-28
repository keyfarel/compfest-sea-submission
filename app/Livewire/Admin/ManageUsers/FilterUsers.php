<?php

namespace App\Livewire\Admin\ManageUsers;

use App\Livewire\Admin\ManageUsers\Index as IndexComponent;
use Livewire\Component;

class FilterUsers extends Component
{
    public string $search = '';
    public string $role = 'Semua Peran';
    public string $status = 'Semua Status';


    public function updated($property)
    {
        $this->dispatch('filtersUpdated',
            search: $this->search,
            role: $this->role,
            status: $this->status
        )->to(IndexComponent::class);
    }

    public function render()
    {
        return view('livewire.admin.manage-users.filter-users');
    }
}

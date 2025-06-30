<?php

namespace App\Livewire\Admin\ManageUsers;

use App\Livewire\Admin\ManageUsers\Index as IndexComponent;
use App\Models\RoleModel;
use Livewire\Component;

class FilterUsers extends Component
{
    public string $search = '';
    public string $role = 'Semua Peran';

    public function updated($property)
    {
        if (in_array($property, ['search', 'role'])) {
            $this->dispatch('filtersUpdated',
                search: $this->search,
                role: $this->role
            )->to(IndexComponent::class);
        }
    }

    public function render()
    {
        $dbRoles = RoleModel::pluck('name')->all();
        $roles = array_merge(['Semua Peran'], $dbRoles);

        return view('livewire.admin.manage-users.filter-users', [
            'roles' => $roles
        ]);
    }
}

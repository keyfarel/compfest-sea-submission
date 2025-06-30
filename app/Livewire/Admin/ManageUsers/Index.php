<?php

namespace App\Livewire\Admin\ManageUsers;

use App\Livewire\Admin\ManageUsers\EditUser as EditUserComponent;
use App\Livewire\Admin\ManageUsers\DeleteUser as DeleteUserComponent;
use App\Models\UserModel;
use App\Models\RoleModel;
use App\Helpers\UserHelpers\UserHelper;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

#[Layout('components.layouts.dashboard.admin.app')]
#[Title('Admin | Manage User - SEA Catering')]
class Index extends Component
{
    use WithPagination;

    public string $search = '';
    public string $role = 'Semua Peran';
    public int $perPage = 5;

    #[On('launchDeleteModal')]
    public function launchDeleteModal(int $userId)
    {
        $user = UserModel::find($userId);
        if ($user) {
            $this->dispatch('launch-delete-modal', userData: $user->toArray())->to(DeleteUserComponent::class);
        }
    }

    #[On('filtersUpdated')]
    public function updateFilters($search, $role)
    {
        $this->search = $search;
        $this->role = $role;
        $this->resetPage();
    }

    #[On('userUpdated')]
    #[On('userDeleted')]
    public function refreshTable()
    {
        $this->resetPage();
    }

    public function render()
    {
        $usersQuery = UserModel::query()
            ->with('role')
            ->when($this->search, function (Builder $query) {
                $searchTerms = explode(' ', $this->search);
                foreach ($searchTerms as $term) {
                    $term = trim($term);
                    if ($term) {
                        $query->where(function (Builder $subQuery) use ($term) {
                            $subQuery->where('name', 'like', '%' . $term . '%')
                                ->orWhere('email', 'like', '%' . $term . '%')
                                ->orWhereHas('role', function (Builder $q) use ($term) {
                                    $q->where('name', 'like', '%' . $term . '%');
                                });
                        });
                    }
                }
            })
            ->when($this->role !== 'Semua Peran', function (Builder $query) {
                $query->whereHas('role', function (Builder $q) {
                    $q->where('name', $this->role);
                });
            })
            ->latest()
            ->paginate($this->perPage);

        $usersQuery->through(function ($user) {
            $userArray = $user->toArray();
            $userArray['role'] = $user->role->name ?? 'User';
            return UserHelper::addUserStyling($userArray);
        });

        $roles = RoleModel::pluck('name')->toArray();

        return view('livewire.admin.manage-users.index', [
            'users' => $usersQuery,
            'roles' => $roles
        ]);
    }
}

<?php

namespace App\Livewire\Admin\ManageUsers;

use App\Livewire\Admin\ManageUsers\EditUser as EditUserComponent;
use App\Livewire\Admin\ManageUsers\DeleteUser as DeleteUserComponent;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

#[Layout('components.layouts.dashboard.admin.app')]
#[Title('Admin | Manage User - SEA Catering')]
class Index extends Component
{
    use WithPagination;
    public array $allUsers = [];
    public string $search = '';
    public string $role = 'Semua Peran';
    public string $status = 'Semua Status';

    public function mount()
    {
        $this->allUsers = [
            ['id' => 1, 'initial' => 'AU', 'name' => 'Admin Utama', 'email' => 'admin@example.com', 'role' => 'Admin', 'status' => 'Aktif', 'join_date' => '20 Jan 2024', 'avatar_bg' => 'bg-purple-100', 'avatar_text' => 'text-purple-700', 'role_bg' => 'bg-purple-100', 'role_text' => 'text-purple-800', 'status_bg' => 'bg-green-100', 'status_text' => 'text-green-800'],
            ['id' => 2, 'initial' => 'CL', 'name' => 'Citra Lestari', 'email' => 'citra.lestari@example.com', 'role' => 'User', 'status' => 'Aktif', 'join_date' => '15 Feb 2024', 'avatar_bg' => 'bg-blue-100', 'avatar_text' => 'text-blue-700', 'role_bg' => 'bg-gray-100', 'role_text' => 'text-gray-800', 'status_bg' => 'bg-green-100', 'status_text' => 'text-green-800'],
            ['id' => 3, 'initial' => 'BH', 'name' => 'Budi Hartono', 'email' => 'budi.hartono@example.com', 'role' => 'User', 'status' => 'Tidak Aktif', 'join_date' => '01 Mar 2024', 'avatar_bg' => 'bg-gray-100', 'avatar_text' => 'text-gray-700', 'role_bg' => 'bg-gray-100', 'role_text' => 'text-gray-800', 'status_bg' => 'bg-red-100', 'status_text' => 'text-red-800'],
            ['id' => 4, 'initial' => 'DS', 'name' => 'Dewi Sartika', 'email' => 'dewi.sartika@example.com', 'role' => 'User', 'status' => 'Aktif', 'join_date' => '10 Apr 2024', 'avatar_bg' => 'bg-pink-100', 'avatar_text' => 'text-pink-700', 'role_bg' => 'bg-gray-100', 'role_text' => 'text-gray-800', 'status_bg' => 'bg-green-100', 'status_text' => 'text-green-800'],
            ['id' => 5, 'initial' => 'EP', 'name' => 'Eko Prasetyo', 'email' => 'eko.prasetyo@example.com', 'role' => 'User', 'status' => 'Aktif', 'join_date' => '22 Mei 2024', 'avatar_bg' => 'bg-indigo-100', 'avatar_text' => 'text-indigo-700', 'role_bg' => 'bg-gray-100', 'role_text' => 'text-gray-800', 'status_bg' => 'bg-green-100', 'status_text' => 'text-green-800'],
            ['id' => 6, 'initial' => 'FW', 'name' => 'Fitri Wulandari', 'email' => 'fitri.wulandari@example.com', 'role' => 'User', 'status' => 'Tidak Aktif', 'join_date' => '05 Jun 2024', 'avatar_bg' => 'bg-yellow-100', 'avatar_text' => 'text-yellow-700', 'role_bg' => 'bg-gray-100', 'role_text' => 'text-gray-800', 'status_bg' => 'bg-red-100', 'status_text' => 'text-red-800'],
            ['id' => 7, 'initial' => 'GS', 'name' => 'Gatot Subroto', 'email' => 'gatot.subroto@example.com', 'role' => 'Admin', 'status' => 'Aktif', 'join_date' => '18 Jun 2024', 'avatar_bg' => 'bg-purple-100', 'avatar_text' => 'text-purple-700', 'role_bg' => 'bg-purple-100', 'role_text' => 'text-purple-800', 'status_bg' => 'bg-green-100', 'status_text' => 'text-green-800'],
            ['id' => 8, 'initial' => 'HS', 'name' => 'Hasan Sadikin', 'email' => 'hasan.sadikin@example.com', 'role' => 'User', 'status' => 'Aktif', 'join_date' => '28 Jun 2024', 'avatar_bg' => 'bg-teal-100', 'avatar_text' => 'text-teal-700', 'role_bg' => 'bg-gray-100', 'role_text' => 'text-gray-800', 'status_bg' => 'bg-green-100', 'status_text' => 'text-green-800'],
            ['id' => 9, 'initial' => 'IA', 'name' => 'Indah Aisyah', 'email' => 'indah.aisyah@example.com', 'role' => 'User', 'status' => 'Aktif', 'join_date' => '01 Jul 2024', 'avatar_bg' => 'bg-orange-100', 'avatar_text' => 'text-orange-700', 'role_bg' => 'bg-gray-100', 'role_text' => 'text-gray-800', 'status_bg' => 'bg-green-100', 'status_text' => 'text-green-800'],
            ['id' => 10, 'initial' => 'JP', 'name' => 'Joko Purwanto', 'email' => 'joko.purwanto@example.com', 'role' => 'User', 'status' => 'Tidak Aktif', 'join_date' => '15 Jul 2024', 'avatar_bg' => 'bg-gray-100', 'avatar_text' => 'text-gray-700', 'role_bg' => 'bg-gray-100', 'role_text' => 'text-gray-800', 'status_bg' => 'bg-red-100', 'status_text' => 'text-red-800'],
            ['id' => 11, 'initial' => 'KN', 'name' => 'Kartini Ningsih', 'email' => 'kartini.ningsih@example.com', 'role' => 'User', 'status' => 'Aktif', 'join_date' => '20 Jul 2024', 'avatar_bg' => 'bg-red-100', 'avatar_text' => 'text-red-700', 'role_bg' => 'bg-gray-100', 'role_text' => 'text-gray-800', 'status_bg' => 'bg-green-100', 'status_text' => 'text-green-800'],
            ['id' => 12, 'initial' => 'LM', 'name' => 'Luhut Manurung', 'email' => 'luhut.manurung@example.com', 'role' => 'User', 'status' => 'Aktif', 'join_date' => '25 Jul 2024', 'avatar_bg' => 'bg-green-100', 'avatar_text' => 'text-green-700', 'role_bg' => 'bg-gray-100', 'role_text' => 'text-gray-800', 'status_bg' => 'bg-green-100', 'status_text' => 'text-green-800'],
        ];
    }

    #[On('launchEditModal')]
    public function launchEditModal(int $userId)
    {
        $user = collect($this->allUsers)->firstWhere('id', $userId);

        if ($user) {
            $this->dispatch('edit-user', userData: $user)->to(EditUserComponent::class);
        }
    }

    #[On('launchDeleteModal')]
    public function launchDeleteModal(int $userId)
    {
        $user = collect($this->allUsers)->firstWhere('id', $userId);
        $this->dispatch('launch-delete-modal', userData: $user)->to(DeleteUserComponent::class);
    }

    #[On('filtersUpdated')]
    public function updateFilters($search, $role, $status)
    {
        $this->search = $search;
        $this->role = $role;
        $this->status = $status;
        $this->resetPage();
    }

    public function render()
    {
        $filteredUsers = collect($this->allUsers)->filter(function ($user) {
            $searchMatch = empty($this->search) ||
                stripos($user['name'], $this->search) !== false ||
                stripos($user['email'], $this->search) !== false;
            $roleMatch = $this->role === 'Semua Peran' || $user['role'] === $this->role;
            $statusMatch = $this->status === 'Semua Status' || $user['status'] === $this->status;
            return $searchMatch && $roleMatch && $statusMatch;
        });

        $perPage = 5;
        $currentPage = Paginator::resolveCurrentPage('page');
        $currentPageItems = $filteredUsers->slice(($currentPage - 1) * $perPage, $perPage);
        $users = new LengthAwarePaginator(
            $currentPageItems,
            $filteredUsers->count(),
            $perPage,
            $currentPage,
            ['path' => Paginator::resolveCurrentPath(), 'pageName' => 'page']
        );

        return view('livewire.admin.manage-users.index', [
            'users' => $users
        ]);
    }
}

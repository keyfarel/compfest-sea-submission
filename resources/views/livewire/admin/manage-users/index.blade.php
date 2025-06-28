<!-- Container -->
<div class="overflow-hidden rounded-xl bg-white shadow-lg ring-1 ring-black ring-opacity-5">

    <!-- Pencarian & Filter -->
    @livewire('admin.manage-users.filter-users', key('filters'))

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y-2 md:divide-y divide-gray-200 md:table">
            @include('livewire.admin.manage-users.components.index._table-header-component')

            <tbody class="bg-white divide-y-2 md:divide-y divide-gray-200">
            @forelse($users as $user)
                @livewire('admin.manage-users.show-user', [
                'user' => $user,
                'index' => $loop->iteration
                ], key('user-row-'.$user['id']))
            @empty
                @include('livewire.admin.manage-users.components.index._empty-user-component')
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $users->links('components.utils.paginations.custom-pagination') }}
    </div>
    @livewire('admin.manage-users.edit-user', key('edit-user-modal'))
    @livewire('admin.manage-users.delete-user', key('delete-user-modal'))
</div>

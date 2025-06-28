<div class="bg-gray-50 p-4 border-b border-gray-200">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <!-- Input Pencarian -->
        @include('livewire.admin.manage-users.components.filter-users._search-component')

        <!-- Filter -->
        @include('livewire.admin.manage-users.components.filter-users._filter-component')
    </div>
</div>

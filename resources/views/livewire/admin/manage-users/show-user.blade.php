<tr class="block md:table-row mb-4 md:mb-0">
    @include('livewire.admin.manage-users.components.show-users._number-component', ['index' => $rowIndex])
    @include('livewire.admin.manage-users.components.show-users._name-component', ['user' => $user])
    @include('livewire.admin.manage-users.components.show-users._role-component', ['user' => $user])
    @include('livewire.admin.manage-users.components.show-users._register-date-component', ['user' => $user])
    @include('livewire.admin.manage-users.components.show-users._action-component', ['user' => $user])
</tr>

<div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3">

    <x-utils.buttons.cancel-button wireClick="$set('showEditModal', false)"/>

    <x-utils.buttons.save-button-primary wireClick="updateUser" target="updateUser" default-text="Simpan" loading-text="Menyimpan Data..."/>
</div>

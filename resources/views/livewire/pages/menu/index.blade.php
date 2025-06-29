<div>
    @include('livewire.pages.menu.components.sections._header-component')
    <section class="bg-white py-16 sm:py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            @livewire('pages.menu.filter-menu')
            @livewire('pages.menu.show-menu')
        </div>
    </section>
    @include('livewire.pages.menu.components.sections._start-component')
</div>

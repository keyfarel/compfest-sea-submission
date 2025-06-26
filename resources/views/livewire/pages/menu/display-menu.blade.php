<div class="relative">

    <div wire:loading class="absolute inset-0 bg-white/70 backdrop-blur-sm flex items-start justify-center pt-24 z-20">
        <x-partials.loading-spinner message="Memuat paket makanan..."/>
    </div>

    <div wire:loading.class.delay="opacity-50"
         class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 m-4 justify-items-center">
        @forelse($plansToShow as $plan)
            @include('livewire.pages.menu.components.partials._meal-plan-card', ['plan' => $plan])
        @empty
            <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-12 text-gray-500">
                <p>Tidak ada paket makanan yang tersedia untuk kategori ini.</p>
            </div>
        @endforelse
    </div>

    @if($selectedPlan)
        @include('livewire.pages.menu.components.modal-component', ['title' => 'Detail Plan'])
    @endif

</div>

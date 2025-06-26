<section class="bg-white py-12 sm:py-16">
    @livewire('pages.subscription.components.form-component')
</section>

@push('css')
    <style>
        input[type="checkbox"]:checked {
            accent-color: #16a34a; /* Tailwind green-600 */
        }
    </style>
@endpush

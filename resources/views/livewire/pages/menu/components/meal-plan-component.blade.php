<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 m-4 justify-items-center">

    @foreach($this->plans as $plan)
        <x-pages.menu.meal-plan-card :plan="$plan" :key="'plan-'.$plan['id']" />
    @endforeach

</div>

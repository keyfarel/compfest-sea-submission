<h3 class="text-lg font-semibold text-gray-900 p-6 border-b border-gray-200">Langganan Terbaru</h3>
<ul role="list" class="divide-y divide-gray-200">
    @forelse ($recentSubscriptions as $sub)
        <li class="p-4 flex items-center justify-between">
            <div>
                <p class="font-medium text-gray-900">{{ $sub->user->name }}</p>
                <p class="text-sm text-gray-500">{{ $sub->plan->name }}</p>
            </div>
            <span class="text-sm text-gray-500">{{ $sub->created_at->diffForHumans() }}</span>
        </li>
    @empty
        <li class="p-4 text-center text-sm text-gray-500">Tidak ada data.</li>
    @endforelse
</ul>

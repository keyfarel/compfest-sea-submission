<div class="space-y-4 lg:hidden">
    @foreach ($subscriptions as $subscription)
    @php
    $status = $subscription->latest_status;
    $statusConfig = [
    'aktif' => ['color' => 'green', 'text' => 'Aktif'],
    'dijeda' => ['color' => 'yellow', 'text' => 'Dijeda'],
    'pending' => ['color' => 'blue', 'text' => 'Pending'],
    'dibatalkan' => ['color' => 'gray', 'text' => 'Dibatalkan'],
    ][$status] ?? ['color' => 'gray', 'text' => 'Unknown'];
    @endphp
    <div class="bg-white shadow-md rounded-lg p-5">
        <div class="flex justify-between items-start">
            <div>
                <p class="font-semibold text-gray-900">{{ $subscription->plan->name }}</p>
                <p class="text-sm text-gray-600">#{{ $subscription->id }}</p>
            </div>
            <span
                class="relative inline-block px-3 py-1 font-semibold text-{{ $statusConfig['color'] }}-900 leading-tight text-xs">
                            <span aria-hidden
                                  class="absolute inset-0 bg-{{ $statusConfig['color'] }}-200 opacity-50 rounded-full"></span>
                            <span class="relative">{{ $statusConfig['text'] }}</span>
                        </span>
        </div>

        <div class="mt-4 pt-4 border-t border-gray-200 space-y-2 text-sm">
            <div class="flex justify-between">
                <span class="text-gray-500">Tanggal Pesan:</span>
                <span
                    class="font-medium text-gray-800">{{ $subscription->created_at->format('d M Y') }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500">Total Harga:</span>
                <span
                    class="font-medium text-gray-800">Rp {{ number_format($subscription->monthly_total_price) }}</span>
            </div>
        </div>

        <div class="mt-4">
            <button wire:click="showDetail({{ $subscription->id }})"
                    class="w-full text-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
                Lihat Detail
            </button>
        </div>
    </div>
    @endforeach
</div>

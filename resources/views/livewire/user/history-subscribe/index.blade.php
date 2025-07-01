<x-slot:title>
    Riwayat Langganan
</x-slot:title>

<div class="space-y-8">
    <div>
        <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">Riwayat Langganan</h1>
        <p class="mt-2 text-lg text-gray-600">Lihat semua transaksi langganan Anda yang lalu dan sekarang.</p>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-x-auto">
        <table class="min-w-full leading-normal">
            <thead>
            <tr class="bg-gray-50">
                <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Tanggal Pesan
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    ID
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Paket Langganan
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Total Harga
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Status
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Aksi
                </th> {{-- Kolom kosong untuk header tombol --}}

            </tr>
            </thead>
            <tbody>
            @forelse ($subscriptions as $subscription)
                @php
                    // Logika untuk menentukan style badge berdasarkan status
                    $status = $subscription->latest_status;
                    $statusConfig = [
                        'aktif' => ['color' => 'green', 'text' => 'Aktif'],
                        'dijeda' => ['color' => 'yellow', 'text' => 'Dijeda'],
                        'pending' => ['color' => 'blue', 'text' => 'Pending'],
                        'dibatalkan' => ['color' => 'gray', 'text' => 'Dibatalkan'],
                    ][$status] ?? ['color' => 'gray', 'text' => 'Unknown'];
                @endphp
                <tr class="hover:bg-gray-50">
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">{{ $subscription->created_at->format('d M Y') }}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">#{{ $subscription->id }}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">{{ $subscription->plan->name }}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            Rp {{ number_format($subscription->monthly_total_price) }}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                            <span
                                class="relative inline-block px-3 py-1 font-semibold text-{{ $statusConfig['color'] }}-900 leading-tight">
                                <span aria-hidden
                                      class="absolute inset-0 bg-{{ $statusConfig['color'] }}-200 opacity-50 rounded-full"></span>
                                <span class="relative">{{ $statusConfig['text'] }}</span>
                            </span>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                        <button wire:click="showDetail({{ $subscription->id }})"
                                class="text-indigo-600 hover:text-indigo-900 font-semibold">
                            Detail
                        </button>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-10 text-gray-500">
                        Anda belum memiliki riwayat langganan.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{-- Link Paginasi --}}
        <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
            {{ $subscriptions->links() }}
        </div>
    </div>

    <x-utils.modals.general-modal wire:model="showDetailModal"
                                  title="Detail Langganan #{{ $selectedSubscription?->id }}">
        @if ($selectedSubscription)
            <div class="overflow-x-auto">
                <table class="min-w-full leading-normal">
                    <thead>
                    <tr class="bg-gray-50">
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Tanggal
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Catatan
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($selectedSubscription->statusHistories as $history)
                        @php
                            $status = $history->status;
                            $statusConfig = [
                                'aktif' => ['color' => 'green', 'text' => 'Aktif'],
                                'dijeda' => ['color' => 'yellow', 'text' => 'Dijeda'],
                                'pending' => ['color' => 'blue', 'text' => 'Pending'],
                                'dibatalkan' => ['color' => 'gray', 'text' => 'Dibatalkan'],
                            ][$status] ?? ['color' => 'gray', 'text' => 'Unknown'];
                        @endphp
                        <tr>
                            <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm">{{ $history->created_at->format('d M Y, H:i') }}</td>
                            <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm">
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-{{ $statusConfig['color'] }}-900 leading-tight">
                                        <span aria-hidden
                                              class="absolute inset-0 bg-{{ $statusConfig['color'] }}-200 opacity-50 rounded-full"></span>
                                        <span class="relative">{{ $statusConfig['text'] }}</span>
                                    </span>
                            </td>
                            <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm">{{ $history->notes ?? '-' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </x-utils.modals.general-modal>
</div>

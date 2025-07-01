<div class="hidden lg:block bg-white shadow-md rounded-lg overflow-x-auto">
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
            </th>
        </tr>
        </thead>
        <tbody>
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
            <tr class="hover:bg-gray-50">
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><p
                        class="text-gray-900 whitespace-no-wrap">{{ $subscription->created_at->format('d M Y') }}</p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><p
                        class="text-gray-900 whitespace-no-wrap">#{{ $subscription->id }}</p></td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><p
                        class="text-gray-900 whitespace-no-wrap">{{ $subscription->plan->name }}</p></td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><p
                        class="text-gray-900 whitespace-no-wrap">
                        Rp {{ number_format($subscription->monthly_total_price) }}</p></td>
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
                            class="text-indigo-600 hover:text-indigo-900 font-semibold">Detail
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

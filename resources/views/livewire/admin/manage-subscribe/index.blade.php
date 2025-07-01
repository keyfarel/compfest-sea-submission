<div>
    <h2 class="text-2xl font-bold mb-4">Langganan Pending</h2>

    @if (session('success'))
        <div class="p-4 mb-4 text-green-800 bg-green-100 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
            <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    ID
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Nama Pelanggan
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Paket
                </th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100"></th>
            </tr>
            </thead>
            <tbody>
            @forelse ($pendingSubscriptions as $sub)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">#{{ $sub->id }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $sub->full_name }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $sub->plan->name }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-right">
                        <button
                            wire:click="activate({{ $sub->id }})"
                            wire:confirm="Anda yakin ingin mengaktifkan langganan ini?"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Aktifkan
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-10">Tidak ada langganan pending saat ini.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

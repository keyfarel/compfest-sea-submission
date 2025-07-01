<div>
    {{-- 1. Header yang Responsif --}}
    <div>
        <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">Langganan Pending</h1>
        <p class="mt-2 text-base text-gray-600 sm:text-lg">Data langganan yang menunggu persetujuan.</p>
    </div>


    <div class="space-y-8">
        {{-- Notifikasi Sukses --}}
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 bg-green-100 rounded-lg shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        {{-- Cek jika ada data --}}
        @if ($pendingSubscriptions->isNotEmpty())

            {{-- 2. Card View (Hanya untuk Mobile) --}}
            <div class="space-y-4 lg:hidden">
                @foreach ($pendingSubscriptions as $sub)
                    <div class="bg-white shadow-md rounded-lg p-5 space-y-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="font-bold text-gray-900">{{ $sub->full_name }}</p>
                                <p class="text-sm text-gray-600">Paket: {{ $sub->plan->name }}</p>
                            </div>
                            <p class="text-xs font-mono text-gray-500">#{{ $sub->id }}</p>
                        </div>

                        <div class="text-sm text-gray-700">
                            Dipesan: <span class="font-semibold">{{ $sub->created_at->diffForHumans() }}</span>
                        </div>

                        <button
                            wire:click="activate({{ $sub->id }})"
                            wire:confirm="Anda yakin ingin mengaktifkan langganan ini?"
                            class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg shadow-sm transition-colors">
                            Aktifkan
                        </button>
                    </div>
                @endforeach
            </div>

            {{-- 3. Table View (Hanya untuk Desktop) --}}
            <div class="hidden lg:block bg-white shadow-md rounded-lg overflow-x-auto">
                <table class="min-w-full leading-normal">
                    <thead>
                    <tr class="bg-gray-50">
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            No.
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            ID
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Nama Pelanggan
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Waktu Pesan
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Paket
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($pendingSubscriptions as $sub)
                        <tr class="hover:bg-gray-50">
                            <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-nowrap">{{ $loop->iteration }}</p>
                            </td>
                            <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-500 whitespace-nowrap">#{{ $sub->id }}</p>
                            </td>
                            <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-nowrap">{{ $sub->full_name }}</p>
                            </td>
                            <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-600 whitespace-nowrap">{{ $sub->created_at->diffForHumans() }}</p>
                            </td>
                            <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-nowrap">{{ $sub->plan->name }}</p>
                            </td>
                            <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm text-center">
                                <button
                                    wire:click="activate({{ $sub->id }})"
                                    wire:confirm="Anda yakin ingin mengaktifkan langganan ini?"
                                    class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg shadow-sm transition-colors">
                                    Aktifkan
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        @else
            {{-- 4. Tampilan jika tidak ada data --}}
            <div class="text-center py-10 px-6 bg-white rounded-lg shadow-sm border">
                <p class="text-gray-600">Tidak ada langganan pending saat ini.</p>
            </div>
        @endif
    </div>
</div>

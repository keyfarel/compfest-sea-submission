<x-slot:title>
    User Dashboard
</x-slot:title>

<div class="space-y-8">
    <div>
        <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">Langganan Saya</h1>
        <p class="mt-2 text-lg text-gray-600">Kelola semua paket langganan Anda di sini.</p>
    </div>

    @forelse ($subscriptions as $subscription)
        @php
            $status = $subscription->latest_status;
            $statusConfig = [
                'aktif' => ['color' => 'green', 'text' => 'Aktif'],
                'dijeda' => ['color' => 'yellow', 'text' => 'Dijeda'],
                'pending' => ['color' => 'blue', 'text' => 'Pending'],
                'dibatalkan' => ['color' => 'red', 'text' => 'Dibatalkan'],
            ][$status] ?? ['color' => 'gray', 'text' => 'Unknown'];
        @endphp

        <div class="overflow-hidden rounded-xl bg-white shadow-lg ring-1 ring-gray-900/5">
            <div
                class="flex flex-wrap items-center justify-between gap-4 border-b border-gray-200 bg-gray-50 p-4 sm:px-6">
                <h2 class="text-xl font-bold {{ $status === 'dibatalkan' ? 'text-gray-500 line-through' : 'text-gray-800' }}">
                    Paket {{ $subscription->plan->name }}
                </h2>
                <span
                    class="inline-flex items-center gap-x-1.5 rounded-full bg-{{ $statusConfig['color'] }}-100 px-3 py-1 text-sm font-semibold text-{{ $statusConfig['color'] }}-800">
                    <svg class="h-1.5 w-1.5 fill-{{ $statusConfig['color'] }}-500" viewBox="0 0 6 6" aria-hidden="true"><circle
                            cx="3" cy="3" r="3"/></svg>
                    {{ $statusConfig['text'] }}
                </span>
            </div>

            <div class="p-4 sm:p-6">
                @if ($status === 'aktif')
                    <div class="space-y-4">
                        <dl class="flex justify-between">
                            <dt class="text-sm font-medium text-gray-500">Nama Paket</dt>
                            <dd class="text-sm font-semibold text-gray-900">{{ $subscription->plan->name }}</dd>
                        </dl>
                        <dl class="flex justify-between">
                            <dt class="text-sm font-medium text-gray-500">Tipe Makanan</dt>
                            <dd class="text-sm text-gray-900">{{ $subscription->mealTypes->pluck('name')->implode(' & ') }}</dd>
                        </dl>
                        <dl class="flex justify-between">
                            <dt class="text-sm font-medium text-gray-500">Hari Pengiriman</dt>
                            <dd class="text-sm text-gray-900">{{ $subscription->deliveryDays->pluck('name')->implode(', ') }}</dd>
                        </dl>
                        <div class="border-t border-gray-200 my-2"></div>
                        <dl class="flex justify-between items-center">
                            <dt class="text-sm font-medium text-gray-500">Total Harga</dt>
                            <dd class="text-lg font-bold text-gray-900">
                                Rp {{ number_format($subscription->monthly_total_price) }}
                                <span class="text-sm font-normal text-gray-500">/ bulan</span>
                            </dd>
                        </dl>
                    </div>
                @elseif($status === 'pending')
                    <div class="rounded-md bg-blue-50 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="ml-3 flex-1 md:flex md:justify-between">
                                <p class="text-sm text-blue-700">Pesanan Anda sedang menunggu konfirmasi pembayaran dari
                                    Admin.</p>
                            </div>
                        </div>
                    </div>
                @elseif($status === 'dijeda')
                    <div class="space-y-4">
                        <div class="rounded-md bg-yellow-50 p-4">
                            <h3 class="text-sm font-semibold text-yellow-800">Langganan Dijeda</h3>
                            <p class="mt-2 text-sm text-yellow-700">
                                @if ($subscription->latestPauseHistory)
                                    Pengiriman Anda dihentikan sementara dari tanggal
                                    <strong>{{ $subscription->latestPauseHistory->pause_start_date->format('d M Y') }}</strong>
                                    hingga
                                    <strong>{{ $subscription->latestPauseHistory->pause_end_date->format('d M Y') }}</strong>
                                    .
                                @else
                                    Pengiriman makanan Anda dihentikan sementara.
                                @endif
                            </p>
                        </div>

                        <div class="border-t border-gray-200 pt-4">
                            <dl class="flex justify-between">
                                <dt class="text-sm font-medium text-gray-500">Nama Paket</dt>
                                <dd class="text-sm font-semibold text-gray-900">{{ $subscription->plan->name }}</dd>
                            </dl>
                            <dl class="flex justify-between mt-2">
                                <dt class="text-sm font-medium text-gray-500">Tipe Makanan</dt>
                                <dd class="text-sm text-gray-900">{{ $subscription->mealTypes->pluck('name')->implode(' & ') }}</dd>
                            </dl>
                            <dl class="flex justify-between mt-2">
                                <dt class="text-sm font-medium text-gray-500">Hari Pengiriman</dt>
                                <dd class="text-sm text-gray-900">{{ $subscription->deliveryDays->pluck('name')->implode(', ') }}</dd>
                            </dl>
                        </div>
                    </div>
                @elseif($status === 'dibatalkan')
                    <div class="space-y-4">
                        <div class="rounded-md bg-red-50 p-4">
                            <h3 class="text-sm font-semibold text-red-800">Langganan Dibatalkan</h3>
                            <p class="mt-2 text-sm text-red-700">
                                Pengiriman Anda Dibatalkan
                            </p>
                        </div>
                        <dl class="flex justify-between">
                            <dt class="text-sm font-medium text-gray-500">Nama Paket</dt>
                            <dd class="text-sm font-semibold text-gray-900">{{ $subscription->plan->name }}</dd>
                        </dl>
                        <dl class="flex justify-between">
                            <dt class="text-sm font-medium text-gray-500">Tipe Makanan</dt>
                            <dd class="text-sm text-gray-900">{{ $subscription->mealTypes->pluck('name')->implode(' & ') }}</dd>
                        </dl>
                        <dl class="flex justify-between">
                            <dt class="text-sm font-medium text-gray-500">Hari Pengiriman</dt>
                            <dd class="text-sm text-gray-900">{{ $subscription->deliveryDays->pluck('name')->implode(', ') }}</dd>
                        </dl>
                    </div>
                @endif
            </div>

            <div
                class="flex flex-col-reverse gap-3 p-4 sm:flex-row sm:justify-end sm:gap-4 sm:px-6 bg-gray-50 border-t border-gray-200">

                @if ($status === 'aktif')
                    <button type="button" wire:click="openPauseModal({{ $subscription->id }})"
                            class="w-full sm:w-auto rounded-lg bg-white px-4 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                        Jeda Langganan
                    </button>
                    <button type="button" wire:click="cancel({{ $subscription->id }})"
                            wire:confirm="Langganan yang dibatalkan tidak bisa diaktifkan kembali. Lanjutkan?"
                            class="w-full sm:w-auto rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500">
                        Batalkan Langganan
                    </button>

                @elseif ($status === 'dijeda')
                    <button type="button" wire:click="cancel({{ $subscription->id }})"
                            wire:confirm="Langganan yang dibatalkan tidak bisa diaktifkan kembali. Lanjutkan?"
                            class="w-full sm:w-auto rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500">
                        Batalkan Saja
                    </button>
                    <button type="button" wire:click="resume({{ $subscription->id }})"
                            class="w-full sm:w-auto rounded-lg bg-green-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-700">
                        Aktifkan Sekarang
                    </button>

                @elseif ($status === 'dibatalkan')
                    <a href="{{ route('subscription') }}" wire:navigate
                       class="w-full sm:w-auto rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
                        Langganan Lagi
                    </a>

                @endif

                {{-- Memang tidak ada tombol yang ditampilkan untuk status 'pending' --}}
            </div>
        </div>
    @empty
        <div class="text-center py-10 px-6 bg-white rounded-lg shadow-sm border">
            <p class="text-gray-600">Anda belum memiliki langganan.</p>
            <a href="{{ route('subscription') }}" wire:navigate
               class="mt-4 inline-block bg-green-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-green-700 transition">
                Mulai Berlangganan Sekarang
            </a>
        </div>
    @endforelse

    <x-utils.modals.general-modal wire:model="showPauseModal" title="Jeda Langganan">
        <div class="space-y-4">
            <div class="p-4 text-sm text-blue-700 bg-blue-100 rounded-lg">
                <p>Pilih rentang tanggal untuk menjeda langganan Anda.</p>
            </div>

            <div>
                <label for="pauseStartDate" class="block text-sm font-medium text-gray-700">Tanggal Mulai Jeda</label>
                <input
                    type="date"
                    id="pauseStartDate"
                    wire:model.live="pauseStartDate"
                    min="{{ now()->format('Y-m-d') }}" {{-- TAMBAHKAN INI --}}
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('pauseStartDate') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="pauseEndDate" class="block text-sm font-medium text-gray-700">Tanggal Akhir Jeda</label>
                <input type="date" id="pauseEndDate" wire:model.live="pauseEndDate"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('pauseEndDate') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>

        <x-slot:footer>
            <button type="button" wire:click="confirmPause" wire:loading.attr="disabled"
                    class="w-full sm:w-auto rounded-lg bg-yellow-500 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-yellow-600">
                Konfirmasi Jeda
            </button>
            <button type="button" @click="open = false"
                    class="w-full sm:w-auto mt-2 sm:mt-0 rounded-lg bg-white px-4 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                Batal
            </button>
        </x-slot:footer>
    </x-utils.modals.general-modal>
</div>

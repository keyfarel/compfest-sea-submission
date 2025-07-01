@if ($subscription)
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
        {{-- Card Header --}}
        <div
            class="flex flex-wrap items-center justify-between gap-4 border-b border-gray-200 bg-gray-50 p-4 sm:px-6">
            <h2 class="text-xl font-bold {{ $status === 'dibatalkan' ? 'text-gray-500 line-through' : 'text-gray-800' }}">
                Paket {{ $subscription->plan->name }}
            </h2>
            <span
                class="inline-flex items-center gap-x-1.5 rounded-full bg-{{ $statusConfig['color'] }}-100 px-3 py-1 text-sm font-semibold text-{{ $statusConfig['color'] }}-800">
                <svg class="h-1.5 w-1.5 fill-{{ $statusConfig['color'] }}-500" viewBox="0 0 6 6" aria-hidden="true">
                    <circle cx="3" cy="3" r="3"/>
                </svg>
                {{ $statusConfig['text'] }}
            </span>
        </div>

        {{-- Card Body --}}
        <div class="p-4 sm:p-6">
            @switch($status)
                @case('aktif')
                    <div class="space-y-4">
                        {{-- This layout stacks on mobile portrait and goes side-by-side on landscape/desktop --}}
                        <dl class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-1 sm:gap-2">
                            <dt class="text-sm font-medium text-gray-500">Nama Paket</dt>
                            <dd class="text-sm font-semibold text-gray-900 sm:text-right">{{ $subscription->plan->name }}</dd>
                        </dl>
                        <dl class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-1 sm:gap-2">
                            <dt class="text-sm font-medium text-gray-500">Tipe Makanan</dt>
                            <dd class="text-sm text-gray-900 sm:text-right">{{ $subscription->mealTypes->pluck('name')->implode(' & ') }}</dd>
                        </dl>
                        <dl class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-1 sm:gap-2">
                            <dt class="text-sm font-medium text-gray-500">Hari Pengiriman</dt>
                            <dd class="text-sm text-gray-900 sm:text-right">{{ $subscription->deliveryDays->pluck('name')->implode(', ') }}</dd>
                        </dl>

                        <div class="!my-6 border-t border-gray-200"></div>

                        <dl class="flex flex-wrap justify-between items-center gap-2">
                            <dt class="text-base font-medium text-gray-500">Total Harga</dt>
                            <dd class="text-lg font-bold text-gray-900">
                                Rp {{ number_format($subscription->monthly_total_price) }}
                                <span class="text-sm font-normal text-gray-500">/ bulan</span>
                            </dd>
                        </dl>
                    </div>
                    @break

                @case('pending')
                    <div class="rounded-md bg-blue-50 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor"
                                     aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3 flex-1">
                                <p class="text-sm text-blue-700">Pesanan Anda sedang menunggu konfirmasi
                                    pembayaran
                                    dari Admin.</p>
                            </div>
                        </div>
                    </div>
                    @break

                @case('dijeda')
                    <div class="rounded-md bg-yellow-50 p-4">
                        <h3 class="text-sm font-semibold text-yellow-800">Langganan Dijeda</h3>
                        <div class="mt-2 text-sm text-yellow-700">
                            @if ($subscription->latestPauseHistory)
                                <p>
                                    Pengiriman Anda dihentikan sementara dari tanggal
                                    <strong>{{ $subscription->latestPauseHistory->pause_start_date->format('d M Y') }}</strong>
                                    hingga
                                    <strong>{{ $subscription->latestPauseHistory->pause_end_date->format('d M Y') }}</strong>.
                                </p>
                            @else
                                <p>Pengiriman makanan Anda dihentikan sementara.</p>
                            @endif
                        </div>
                    </div>
                    @break

                @case('dibatalkan')
                    <div class="space-y-4 text-gray-500">
                        <dl class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-1 sm:gap-2">
                            <dt class="text-sm font-medium">Nama Paket</dt>
                            <dd class="text-sm font-semibold sm:text-right">{{ $subscription->plan->name }}</dd>
                        </dl>
                        <dl class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-1 sm:gap-2">
                            <dt class="text-sm font-medium">Tipe Makanan</dt>
                            <dd class="text-sm sm:text-right">{{ $subscription->mealTypes->pluck('name')->implode(' & ') }}</dd>
                        </dl>
                        <dl class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-1 sm:gap-2">
                            <dt class="text-sm font-medium">Hari Pengiriman</dt>
                            <dd class="text-sm sm:text-right">{{ $subscription->deliveryDays->pluck('name')->implode(', ') }}</dd>
                        </dl>
                    </div>
                    @break
            @endswitch
        </div>

        {{-- Card Footer with Dynamic Buttons (No changes needed here) --}}
        <div class="border-t border-gray-200 bg-gray-50 p-4">
            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end sm:gap-4">
                @switch($status)
                    @case('aktif')
                        <button type="button" wire:click="openPauseModal"
                                class="w-full sm:w-auto rounded-lg bg-white px-4 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                            Jeda Langganan
                        </button>
                        <button type="button" wire:click="cancel"
                                wire:confirm="Langganan yang dibatalkan tidak bisa diaktifkan kembali. Lanjutkan?"
                                class="w-full sm:w-auto rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500">
                            Batalkan Langganan
                        </button>
                        @break

                    @case('dijeda')
                        <button type="button" wire:click="cancel"
                                wire:confirm="Langganan yang dibatalkan tidak bisa diaktifkan kembali. Lanjutkan?"
                                class="w-full sm:w-auto rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500">
                            Batalkan Saja
                        </button>
                        <button type="button" wire:click="resume"
                                class="w-full sm:w-auto rounded-lg bg-green-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-700">
                            Aktifkan Sekarang
                        </button>
                        @break

                    @case('dibatalkan')
                        <a href="{{ route('subscription') }}" wire:navigate
                           class="w-full sm:w-auto text-center rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
                            Langganan Lagi
                        </a>
                        @break
                @endswitch
            </div>
        </div>
    </div>

@else
    {{-- Empty State Card --}}
    <div class="rounded-xl border bg-white text-center shadow-sm">
        <div class="p-6 sm:p-10">
            <h3 class="text-lg font-semibold text-gray-800">Anda Belum Berlangganan</h3>
            <p class="mt-2 text-gray-600">Mulai berlangganan untuk menikmati menu sehat setiap hari.</p>
            <a href="{{ route('subscription') }}" wire:navigate
               class="mt-6 inline-flex items-center justify-center rounded-lg bg-green-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-700 transition-all">
                Lihat Paket Langganan
            </a>
        </div>
    </div>
@endif

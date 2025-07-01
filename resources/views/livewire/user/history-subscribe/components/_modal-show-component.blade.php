<x-utils.modals.general-modal wire:model="showDetailModal" title="Detail Langganan #{{ $selectedSubscription?->id }}">
    @if ($selectedSubscription)
        <div class="space-y-3">
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
                <div class="p-4 border rounded-lg space-y-2">
                    <div class="flex justify-between items-center">
                        <p class="text-sm font-medium text-gray-500">{{ $history->created_at->format('d M Y, H:i') }}</p>
                        <span class="relative inline-block px-3 py-1 font-semibold text-{{ $statusConfig['color'] }}-900 leading-tight text-xs">
                                <span aria-hidden class="absolute inset-0 bg-{{ $statusConfig['color'] }}-200 opacity-50 rounded-full"></span>
                                <span class="relative">{{ $statusConfig['text'] }}</span>
                            </span>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-800">Catatan:</p>
                        <p class="text-sm text-gray-600">{{ $history->notes ?? '-' }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</x-utils.modals.general-modal>

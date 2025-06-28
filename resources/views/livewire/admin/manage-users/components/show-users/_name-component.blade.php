<td class="px-6 py-4 whitespace-nowrap md:table-cell block">
    <div class="flex items-center">
        <div class="flex-shrink-0 h-10 w-10">
                <span class="inline-flex h-10 w-10 items-center justify-center rounded-full {{ $user['avatar_bg'] }}">
                    <span class="font-medium {{ $user['avatar_text'] }}">{{ $user['initial'] }}</span>
                </span>
        </div>
        <div class="ml-4">
            <div class="text-sm font-medium text-gray-900">{{ $user['name'] }}</div>
            <div class="text-sm text-gray-500">{{ $user['email'] }}</div>
        </div>
    </div>
</td>

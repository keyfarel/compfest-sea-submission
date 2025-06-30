@use('App\Helpers\DateHelpers\DateHelper')

<td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500 md:table-cell block md:text-center">
    <span class="md:hidden text-xs font-bold text-gray-500 uppercase">Tgl Bergabung: </span>
    {{ DateHelper::formatJoinDate($user['created_at']) }}
</td>

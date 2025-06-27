@php
    $users = [
        ['id' => 1, 'name' => 'Bejo Paijo', 'email' => 'bejo@example.com', 'role' => 'Admin'],
        ['id' => 2, 'name' => 'Siti Aminah', 'email' => 'siti@example.com', 'role' => 'User'],
        ['id' => 3, 'name' => 'Dedi Santoso', 'email' => 'dedi@example.com', 'role' => 'User'],
        ['id' => 4, 'name' => 'Ayu Larasati', 'email' => 'ayu@example.com', 'role' => 'User'],
        ['id' => 5, 'name' => 'Andi Wijaya', 'email' => 'andi@example.com', 'role' => 'Admin'],
        ['id' => 6, 'name' => 'Maya Sari', 'email' => 'maya@example.com', 'role' => 'User'],
    ];

    $perPage = 3;
    $currentPage = request()->get('page', 1);
    $paginatedUsers = collect($users)->slice(($currentPage - 1) * $perPage, $perPage);
    $totalPages = ceil(count($users) / $perPage);
@endphp

<div class="rounded-2xl bg-white p-6 shadow-xl ring-1 ring-gray-100">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Kelola Pengguna</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-gray-700">
            <thead>
            <tr class="bg-gray-50 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                <th class="px-6 py-3 text-center">#</th>
                <th class="px-6 py-3 text-center">Nama</th>
                <th class="px-6 py-3 text-center">Email</th>
                <th class="px-6 py-3 text-center">Role</th>
                <th class="px-6 py-3 text-center">Aksi</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 bg-white">
            @foreach ($paginatedUsers as $index => $user)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-center">{{ ($currentPage - 1) * $perPage + $index + 1 }}</td>
                    <td class="px-6 py-4 font-medium text-center text-gray-900">{{ $user['name'] }}</td>
                    <td class="px-6 py-4 text-center">{{ $user['email'] }}</td>
                    <td class="px-6 py-4 text-center">
    <span
        class="inline-block w-24 rounded-full px-3 py-1 text-xs font-semibold
            {{ $user['role'] === 'Admin'
                ? 'bg-green-500/10 text-green-700'
                : 'bg-gray-500/10 text-gray-700' }}
        ">
        {{ $user['role'] }}
    </span>
                    </td>

                    <td class="px-6 py-4 text-center">
                        <div class="inline-flex gap-2">
                            <button
                                class="px-4 py-1.5 rounded-lg bg-blue-500 hover:bg-blue-600 text-white text-xs font-medium transition">
                                Edit
                            </button>
                            <button
                                class="px-4 py-1.5 rounded-lg bg-red-500 hover:bg-red-600 text-white text-xs font-medium transition">
                                Hapus
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-6 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">
            <p class="text-sm text-gray-500">Menampilkan halaman {{ $currentPage }} dari {{ $totalPages }}</p>
            <div class="flex gap-2">
                @for ($i = 1; $i <= $totalPages; $i++)
                    <a href="?page={{ $i }}"
                       class="inline-flex items-center justify-center px-4 py-1.5 rounded-lg text-sm font-medium
                           {{ $i == $currentPage ? 'bg-green-600 text-white' : 'bg-gray-200 hover:bg-gray-300 text-gray-700' }}">
                        {{ $i }}
                    </a>
                @endfor
            </div>
        </div>
    </div>
</div>

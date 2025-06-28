<x-layouts.dashboard.admin.app>
    <!-- Container -->
    <div class="overflow-hidden rounded-xl bg-white shadow-lg ring-1 ring-black ring-opacity-5">

        <!-- Pencarian & Filter -->
        <div class="bg-gray-50 p-4 border-b border-gray-200">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                <!-- Input Pencarian -->
                <div class="relative w-full md:flex-1">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <input
                        type="search"
                        placeholder="Cari pengguna..."
                        class="placeholder:text-sm w-full rounded-lg border border-gray-300 pl-10 pr-3 py-2 text-sm font-semibold shadow-sm focus:outline-none focus:border-green-600 focus:ring-0"
                    />
                </div>

                <!-- Filter -->
                <div x-data="{ open: false, selectedRole: 'Semua Peran', selectedStatus: 'Semua Status' }"
                     class="relative w-full md:w-auto">
                    <button @click="open = !open" @click.outside="open = false" type="button"
                            class="inline-flex w-full justify-center items-center gap-x-2 rounded-lg border border-green-600 bg-green-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-700">
                        <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.572a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z"/>
                        </svg>
                        Filter Opsi
                    </button>

                    <!-- Dropdown -->
                    <div x-show="open" x-transition
                         class="absolute mt-2 z-20 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none p-4 space-y-4
                    left-0 right-0
                    md:left-auto md:w-64">

                        <!-- Filter Role -->
                        <div>
                            <p class="text-sm font-semibold text-gray-700 mb-1">Role</p>
                            <template x-for="role in ['Semua Peran', 'Admin', 'User']" :key="role">
                                <label
                                    class="block text-sm cursor-pointer rounded px-2 py-1"
                                    :class="selectedRole === role ? 'bg-green-100 text-green-700 font-semibold' : 'text-gray-600 hover:bg-gray-100'">
                                    <input type="radio" class="hidden" name="role" :value="role"
                                           @change="selectedRole = role">
                                    <span x-text="role"></span>
                                </label>
                            </template>
                        </div>

                        <!-- Filter Status -->
                        <div>
                            <p class="text-sm font-semibold text-gray-700 mb-1">Status</p>
                            <template x-for="status in ['Semua Status', 'Aktif', 'Tidak Aktif']" :key="status">
                                <label
                                    class="block text-sm cursor-pointer rounded px-2 py-1"
                                    :class="selectedStatus === status ? 'bg-green-100 text-green-700 font-semibold' : 'text-gray-600 hover:bg-gray-100'">
                                    <input type="radio" class="hidden" name="status" :value="status"
                                           @change="selectedStatus = status">
                                    <span x-text="status"></span>
                                </label>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y-2 md:divide-y divide-gray-200 md:table">
                <thead class="bg-gray-50 hidden md:table-header-group">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">No
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                        Pengguna
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Peran
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Tanggal Bergabung
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y-2 md:divide-y divide-gray-200">

                <tr class="block md:table-row">
                    <td class="hidden md:table-cell px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                        1
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap md:table-cell block">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                    <span
                                        class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-purple-100">
                                        <span class="font-medium text-purple-700">AU</span>
                                    </span>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Admin Utama</div>
                                <div class="text-sm text-gray-500">admin@example.com</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap md:table-cell block md:text-center">
                        <span class="md:hidden text-xs font-bold text-gray-500 uppercase">Peran: </span>
                        <span
                            class="inline-flex items-center rounded-full bg-purple-100 px-2.5 py-0.5 text-xs font-medium text-purple-800">Admin</span>
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap md:table-cell block md:text-center">
                        <span class="md:hidden text-xs font-bold text-gray-500 uppercase">Status: </span>
                        <span
                            class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">Aktif</span>
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500 md:table-cell block md:text-center">
                        <span class="md:hidden text-xs font-bold text-gray-500 uppercase">Tgl Bergabung: </span>
                        20 Jan 2024
                    </td>
                    <td class="px-0 py-0 md:px-6 md:py-4 whitespace-nowrap text-sm font-medium md:table-cell block">
                        <div class="text-center md:text-right md:space-x-4">
                            <a href="#"
                               class="block md:inline text-indigo-600 hover:text-indigo-900 py-3 md:py-0 border-t md:border-0">Edit</a>
                            <a href="#"
                               class="block md:inline text-red-600 hover:text-red-900 py-3 md:py-0 border-t md:border-0">Hapus</a>
                        </div>
                    </td>
                </tr>

                <tr class="block md:table-row">
                    <td class="hidden md:table-cell px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                        2
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap md:table-cell block">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                     <span
                                         class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-blue-100">
                                        <span class="font-medium text-blue-700">CL</span>
                                    </span>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Citra Lestari</div>
                                <div class="text-sm text-gray-500">citra.lestari@example.com</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap md:table-cell block md:text-center">
                        <span class="md:hidden text-xs font-bold text-gray-500 uppercase">Peran: </span>
                        <span
                            class="inline-flex items-center rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-800">User</span>
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap md:table-cell block md:text-center">
                        <span class="md:hidden text-xs font-bold text-gray-500 uppercase">Status: </span>
                        <span
                            class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">Aktif</span>
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500 md:table-cell block md:text-center">
                        <span class="md:hidden text-xs font-bold text-gray-500 uppercase">Tgl Bergabung: </span>
                        15 Feb 2024
                    </td>
                    <td class="px-0 py-0 md:px-6 md:py-4 whitespace-nowrap text-sm font-medium md:table-cell block">
                        <div class="text-center md:text-right md:space-x-4">
                            <a href="#"
                               class="block md:inline text-indigo-600 hover:text-indigo-900 py-3 md:py-0 border-t md:border-0">Edit</a>
                            <a href="#"
                               class="block md:inline text-red-600 hover:text-red-900 py-3 md:py-0 border-t md:border-0">Hapus</a>
                        </div>
                    </td>
                </tr>

                <tr class="block md:table-row">
                    <td class="hidden md:table-cell px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                        3
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap md:table-cell block">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                     <span
                                         class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-gray-100">
                                        <span class="font-medium text-gray-700">BH</span>
                                    </span>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Budi Hartono</div>
                                <div class="text-sm text-gray-500">budi.hartono@example.com</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap md:table-cell block md:text-center">
                        <span class="md:hidden text-xs font-bold text-gray-500 uppercase">Peran: </span>
                        <span
                            class="inline-flex items-center rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-800">User</span>
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap md:table-cell block md:text-center">
                        <span class="md:hidden text-xs font-bold text-gray-500 uppercase">Status: </span>
                        <span
                            class="inline-flex items-center rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-800">Tidak Aktif</span>
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500 md:table-cell block md:text-center">
                        <span class="md:hidden text-xs font-bold text-gray-500 uppercase">Tgl Bergabung: </span>
                        01 Mar 2024
                    </td>
                    <td class="px-0 py-0 md:px-6 md:py-4 whitespace-nowrap text-sm font-medium md:table-cell block">
                        <div class="text-center md:text-right md:space-x-4">
                            <a href="#"
                               class="block md:inline text-indigo-600 hover:text-indigo-900 py-3 md:py-0 border-t md:border-0">Edit</a>
                            <a href="#"
                               class="block md:inline text-red-600 hover:text-red-900 py-3 md:py-0 border-t md:border-0">Hapus</a>
                        </div>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
            <div class="flex flex-1 justify-between sm:hidden">
                <a href="#"
                   class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Sebelumnya</a>
                <a href="#"
                   class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Berikutnya</a>
            </div>
            <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-700">
                        Menampilkan
                        <span class="font-medium">1</span>
                        sampai
                        <span class="font-medium">10</span>
                        dari
                        <span class="font-medium">57</span>
                        hasil
                    </p>
                </div>
                <div>
                    <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                        <!-- Tombol Sebelumnya -->
                        <a href="#"
                           class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                            <span class="sr-only">Sebelumnya</span>
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </a>

                        <!-- Halaman Aktif -->
                        <a href="#" aria-current="page"
                           class="relative z-10 inline-flex items-center bg-green-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">1</a>

                        <!-- Halaman Lain -->
                        <a href="#"
                           class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">2</a>
                        <a href="#"
                           class="relative hidden items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">3</a>
                        <span
                            class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 ring-1 ring-inset ring-gray-300 focus:outline-offset-0">...</span>
                        <a href="#"
                           class="relative hidden items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">6</a>

                        <!-- Tombol Berikutnya -->
                        <a href="#"
                           class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                            <span class="sr-only">Berikutnya</span>
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard.admin.app>

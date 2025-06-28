<x-slot:title>
    User Dashboard
</x-slot:title>

<div class="space-y-8">
    <!-- Header Halaman -->
    <div>
        <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">Langganan Saya</h1>
        <p class="mt-2 text-lg text-gray-600">Kelola semua paket langganan Anda di sini.</p>
    </div>

    <!-- Kartu 1: Langganan Aktif -->
    <div class="overflow-hidden rounded-xl bg-white shadow-lg ring-1 ring-gray-900/5">
        <!-- Header Kartu -->
        <div class="flex flex-wrap items-center justify-between gap-4 border-b border-gray-200 bg-gray-50 p-4 sm:px-6">
            <h2 class="text-xl font-bold text-gray-800">Paket Protein Plan</h2>
            <span
                class="inline-flex items-center gap-x-1.5 rounded-full bg-green-100 px-3 py-1 text-sm font-semibold text-green-800">
                    <svg class="h-1.5 w-1.5 fill-green-500" viewBox="0 0 6 6" aria-hidden="true"><circle cx="3" cy="3"
                                                                                                         r="3"/></svg>
                    Aktif
                </span>
        </div>

        <!-- Detail Langganan -->
        <div class="p-4 sm:p-6">
            <dl class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-3">
                <div class="sm:col-span-1 text-center sm:text-left">
                    <dt class="text-sm font-medium text-gray-500">Tipe Makanan</dt>
                    <dd class="mt-1 flex items-center justify-center sm:justify-start gap-2 text-base text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-egg-fried flex-shrink-0" viewBox="0 0 16 16">
                            <path d="M8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            <path
                                d="M13.997 5.17a5 5 0 0 0-8.101-4.09A5 5 0 0 0 1.27 6.176a5 5 0 0 0 4.09 8.102A5.001 5.001 0 0 0 13.997 5.17zM14 5a4 4 0 0 1-4.003 3.997A4 4 0 0 1 6 14a4 4 0 0 1-3.997-4.003A4 4 0 0 1 6 2a4 4 0 0 1 4.003-3.997A4 4 0 0 1 14 5z"/>
                        </svg>
                        <span>Makan Siang & Malam</span>
                    </dd>
                </div>
                <div class="sm:col-span-1 text-center sm:text-left">
                    <dt class="text-sm font-medium text-gray-500">Hari Pengiriman</dt>
                    <dd class="mt-1 flex items-center justify-center sm:justify-start gap-2 text-base text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-calendar-week flex-shrink-0" viewBox="0 0 16 16">
                            <path
                                d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                        </svg>
                        <span>Senin - Jumat</span>
                    </dd>
                </div>
                <div class="sm:col-span-1 text-center sm:text-right">
                    <dt class="text-sm font-medium text-gray-500">Total Harga</dt>
                    <dd class="mt-1 text-xl font-bold text-gray-900">Rp 860.000 <span
                            class="text-sm font-normal text-gray-500">/ bulan</span></dd>
                </div>
            </dl>
        </div>

        <!-- Aksi/Tombol -->
        <div
            class="flex flex-col-reverse gap-3 p-4 sm:flex-row sm:justify-end sm:gap-4 sm:px-6 bg-gray-50 border-t border-gray-200">
            <button type="button"
                    class="w-full sm:w-auto rounded-lg bg-white px-4 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                Jeda Langganan
            </button>
            <button type="button"
                    class="w-full sm:w-auto rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                Batalkan Langganan
            </button>
        </div>
    </div>


    <!-- Kartu 2: Langganan Dijeda -->
    <div class="overflow-hidden rounded-xl bg-white shadow-lg ring-1 ring-gray-900/5">
        <!-- Header Kartu -->
        <div class="flex flex-wrap items-center justify-between gap-4 border-b border-gray-200 bg-gray-50 p-4 sm:px-6">
            <h2 class="text-xl font-bold text-gray-800">Paket Royal Plan</h2>
            <span
                class="inline-flex items-center gap-x-1.5 rounded-full bg-yellow-100 px-3 py-1 text-sm font-semibold text-yellow-800">
                    <svg class="h-1.5 w-1.5 fill-yellow-500" viewBox="0 0 6 6" aria-hidden="true"><circle cx="3" cy="3"
                                                                                                          r="3"/></svg>
                    Dijeda
                </span>
        </div>

        <!-- Detail Langganan -->
        <div class="p-4 sm:p-6">
            <div class="rounded-md bg-yellow-50 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-semibold text-yellow-800">Langganan Dijeda</h3>
                        <div class="mt-2 text-sm text-yellow-700">
                            <p>Langganan Anda akan aktif kembali pada tanggal <strong>25 Juli 2025</strong>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Aksi/Tombol -->
        <div
            class="flex flex-col-reverse gap-3 p-4 sm:flex-row sm:justify-end sm:gap-4 sm:px-6 bg-gray-50 border-t border-gray-200">
            <button type="button"
                    class="w-full sm:w-auto rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500">
                Batalkan Saja
            </button>
            <button type="button"
                    class="w-full sm:w-auto rounded-lg bg-green-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-700">
                Aktifkan Sekarang
            </button>
        </div>
    </div>

    <!-- Kartu 3: Langganan Dibatalkan -->
    <div class="overflow-hidden rounded-xl bg-white shadow-lg ring-1 ring-gray-900/5">
        <!-- Header Kartu -->
        <div class="flex flex-wrap items-center justify-between gap-4 border-b border-gray-200 bg-gray-50 p-4 sm:px-6">
            <h2 class="text-xl font-bold text-gray-500 line-through">Paket Diet Plan</h2>
            <span
                class="inline-flex items-center gap-x-1.5 rounded-full bg-gray-100 px-3 py-1 text-sm font-semibold text-gray-800">
                    <svg class="h-1.5 w-1.5 fill-gray-500" viewBox="0 0 6 6" aria-hidden="true"><circle cx="3" cy="3"
                                                                                                        r="3"/></svg>
                    Tidak Aktif
                </span>
        </div>

        <!-- Detail Langganan -->
        <div class="p-4 sm:p-6">
            <p class="text-center text-gray-500">Anda telah membatalkan langganan ini. Mulai langganan baru kapan
                saja!</p>
        </div>

        <!-- Aksi/Tombol -->
        <div
            class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3 p-4 sm:px-6 bg-gray-50 border-t border-gray-200">
            <button type="button"
                    class="w-full sm:w-auto rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
                Langganan Lagi
            </button>
        </div>
    </div>


</div>

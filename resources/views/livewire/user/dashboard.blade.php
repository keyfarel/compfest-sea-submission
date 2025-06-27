<x-slot:title>
    User Dashboard
</x-slot:title>

<div class="space-y-8">
    <div>
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Langganan Saya</h1>
        <p class="mt-1 text-gray-600">Kelola semua paket langganan aktif Anda di sini.</p>
    </div>

    <div class="overflow-hidden rounded-lg bg-white shadow-md ring-1 ring-gray-900/5">
        {{-- Header Kartu --}}
        <div
            class="flex flex-wrap items-center justify-between gap-4 border-b border-gray-200 bg-gray-50/50 p-4 sm:px-6">
            <h2 class="text-lg font-bold text-gray-800">Paket Diet Sehat</h2>
            <span
                class="inline-flex items-center rounded-full bg-green-100 px-3 py-1 text-sm font-semibold text-green-800">
                <svg class="-ml-1 mr-1.5 h-2 w-2 text-green-500" fill="currentColor" viewBox="0 0 8 8"><circle cx="4"
                                                                                                               cy="4"
                                                                                                               r="3"/></svg>
                Aktif
            </span>
        </div>

        {{-- Detail Langganan --}}
        <div class="p-4 sm:px-6">
            <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-3">
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Tipe Makanan</dt>
                    <dd class="mt-1 text-base text-gray-900">Makan Siang & Malam</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Hari Pengiriman</dt>
                    <dd class="mt-1 text-base text-gray-900">Senin - Jumat</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Total Harga</dt>
                    <dd class="mt-1 text-base font-semibold text-gray-900">Rp 750.000 / minggu</dd>
                </div>
            </dl>
        </div>

        {{-- Aksi/Tombol --}}
        <div class="flex items-center justify-end gap-4 border-t border-gray-200 bg-gray-50/50 p-4 sm:px-6">
            <button type="button" class="font-semibold text-red-600 hover:text-red-500">Batalkan</button>
            <button type="button"
                    class="rounded-md bg-white px-4 py-2 font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                Jeda Langganan
            </button>
            <button type="button"
                    class="rounded-md bg-green-600 px-4 py-2 font-semibold text-white shadow-sm hover:bg-green-700">Ubah
                Paket
            </button>
        </div>
    </div>


    <div class="overflow-hidden rounded-lg bg-white shadow-md ring-1 ring-gray-900/5">
        {{-- Header Kartu --}}
        <div
            class="flex flex-wrap items-center justify-between gap-4 border-b border-gray-200 bg-gray-50/50 p-4 sm:px-6">
            <h2 class="text-lg font-bold text-gray-800">Paket Katering Kantor</h2>
            <span
                class="inline-flex items-center rounded-full bg-yellow-100 px-3 py-1 text-sm font-semibold text-yellow-800">
                <svg class="-ml-1 mr-1.5 h-2 w-2 text-yellow-500" fill="currentColor" viewBox="0 0 8 8"><circle cx="4"
                                                                                                                cy="4"
                                                                                                                r="3"/></svg>
                Dijeda
            </span>
        </div>

        {{-- Detail Langganan --}}
        <div class="p-4 sm:px-6">
            <p class="text-gray-700">Langganan Anda dijeda dan akan aktif kembali pada tanggal **25 Juli 2025**.</p>
        </div>

        {{-- Aksi/Tombol --}}
        <div class="flex items-center justify-end gap-4 border-t border-gray-200 bg-gray-50/50 p-4 sm:px-6">
            <button type="button"
                    class="rounded-md bg-green-600 px-4 py-2 font-semibold text-white shadow-sm hover:bg-green-700">
                Aktifkan Kembali
            </button>
        </div>
    </div>

</div>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard {{ ucfirst(Auth::user()->role) }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (Auth::user()->role === 'admin')
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white shadow rounded-lg p-6">
                        <h3 class="text-lg font-semibold">Total Produk</h3>
                        <p class="text-2xl mt-2 font-bold text-blue-600">123</p>
                    </div>
                    <div class="bg-white shadow rounded-lg p-6">
                        <h3 class="text-lg font-semibold">Transaksi Belum Lunas</h3>
                        <p class="text-2xl mt-2 font-bold text-red-600">5</p>
                    </div>
                    <div class="bg-white shadow rounded-lg p-6">
                        <h3 class="text-lg font-semibold">Total Customer</h3>
                        <p class="text-2xl mt-2 font-bold text-green-600">42</p>
                    </div>
                </div>

                <div class="mt-8 bg-white shadow rounded-lg p-6">
                    <h3 class="text-xl font-semibold mb-4">Aksi Cepat</h3>
                    <ul class="list-disc pl-6 space-y-2">
                        <li><a href="#" class="text-blue-600 hover:underline">Kelola Produk</a></li>
                        <li><a href="#" class="text-blue-600 hover:underline">Verifikasi Pembayaran</a></li>
                        <li><a href="#" class="text-blue-600 hover:underline">Lihat Semua Pesanan</a></li>
                    </ul>
                </div>

            @elseif (Auth::user()->role === 'customer')
                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-xl font-semibold">Selamat datang, {{ Auth::user()->name }}!</h3>
                    <p class="mt-2 text-gray-700">Berikut ringkasan akun Anda:</p>

                    <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="bg-gray-100 p-4 rounded">
                            <h4 class="font-semibold">Pesanan Aktif</h4>
                            <p class="text-lg text-blue-600 font-bold">2</p>
                        </div>
                        <div class="bg-gray-100 p-4 rounded">
                            <h4 class="font-semibold">Riwayat Pembelian</h4>
                            <p class="text-lg text-green-600 font-bold">8</p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="#" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Belanja Sekarang
                        </a>
                        <a href="#" class="inline-block ml-4 text-blue-600 hover:underline">
                            Lihat Pesanan Saya
                        </a>
                    </div>
                </div>
            @else
                <div class="bg-white p-6 rounded shadow text-red-600 font-semibold">
                    Role tidak dikenali.
                </div>
            @endif

        </div>
    </div>
</x-app-layout>

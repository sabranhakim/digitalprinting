<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Daftar Produk
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Tampilkan tombol tambah produk hanya untuk admin --}}
            @if (Auth::user()->role === 'admin')
                <a href="{{ route('product.create') }}"
                    class="mb-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    + Tambah Produk
                </a>
            @endif

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($products as $product)
                    <div class="bg-white rounded shadow p-4 flex flex-col">
                        @if ($product->image)
                            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"
                                class="w-full h-40 object-cover rounded mb-4">
                        @else
                            <div
                                class="w-full h-40 bg-gray-100 text-center flex items-center justify-center mb-4 rounded">
                                <span class="text-gray-500 text-sm">Tidak ada gambar</span>
                            </div>
                        @endif

                        <h3 class="text-lg font-bold mb-1">{{ $product->name }}</h3>
                        <p class="text-gray-700 text-sm line-clamp-3 mb-2">{{ $product->description }}</p>
                        <p class="text-green-700 font-semibold mb-1">Rp
                            {{ number_format($product->price, 0, ',', '.') }}</p>
                        <p class="text-gray-500 text-sm mb-2">Stok: {{ $product->stock }}</p>

                        {{-- Tampilkan aksi CRUD hanya untuk admin --}}
                        @if (Auth::user()->role === 'admin')
                            <div class="mt-auto flex justify-between items-center pt-2 border-t">
                                <a href="{{ route('product.edit', $product->id) }}"
                                    class="text-blue-600 hover:underline text-sm">Edit</a>

                                <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                    onsubmit="return confirm('Hapus produk ini?')">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600 hover:underline text-sm">Hapus</button>
                                </form>
                            </div>
                        @endif
                        {{-- Tombol checkout hanya untuk customer --}}
                        @if (Auth::user()->role === 'customer')
                            <div class="mt-8 text-right">
                                <a href="{{ route('checkout.form') }}"
                                    class="inline-block bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700">
                                    Checkout Sekarang
                                </a>
                            </div>
                        @endif
                    </div>
                @empty
                    <p class="text-gray-600">Belum ada produk.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">Tambah Produk</h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded shadow">
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block font-medium">Nama Produk</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                           class="w-full border rounded px-3 py-2 mt-1" required>
                </div>

                <div class="mb-4">
                    <label for="image" class="block font-medium">Gambar (opsional)</label>
                    <input type="file" name="image" id="image" class="w-full border rounded px-3 py-2 mt-1">
                </div>

                <div class="mb-4">
                    <label for="description" class="block font-medium">Deskripsi</label>
                    <textarea name="description" id="description" rows="4"
                              class="w-full border rounded px-3 py-2 mt-1" required>{{ old('description') }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="price" class="block font-medium">Harga (Rp)</label>
                    <input type="number" name="price" id="price" value="{{ old('price') }}"
                           class="w-full border rounded px-3 py-2 mt-1" required>
                </div>

                <div class="mb-4">
                    <label for="stock" class="block font-medium">Stok</label>
                    <input type="number" name="stock" id="stock" value="{{ old('stock') }}"
                           class="w-full border rounded px-3 py-2 mt-1" required>
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('product.index') }}" class="text-gray-600 hover:underline mr-4">Batal</a>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

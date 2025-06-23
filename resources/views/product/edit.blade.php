<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">Edit Produk</h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                    <ul class="list-disc ml-4">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block font-medium">Nama Produk</label>
                    <input type="text" name="name" id="name"
                           value="{{ old('name', $product->name) }}"
                           class="w-full border rounded px-3 py-2 mt-1" required>
                </div>

                <div class="mb-4">
                    <label for="image" class="block font-medium">Gambar (opsional)</label>
                    <input type="file" name="image" id="image" class="w-full border rounded px-3 py-2 mt-1">
                    @if ($product->image)
                        <img src="{{ asset('images/' . $product->image) }}" class="mt-2 w-32 h-auto rounded">
                    @endif
                </div>

                <div class="mb-4">
                    <label for="description" class="block font-medium">Deskripsi</label>
                    <textarea name="description" id="description" rows="4"
                              class="w-full border rounded px-3 py-2 mt-1" required>{{ old('description', $product->description) }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="price" class="block font-medium">Harga (Rp)</label>
                    <input type="number" name="price" id="price"
                           value="{{ old('price', $product->price) }}"
                           class="w-full border rounded px-3 py-2 mt-1" required>
                </div>

                <div class="mb-4">
                    <label for="stock" class="block font-medium">Stok</label>
                    <input type="number" name="stock" id="stock"
                           value="{{ old('stock', $product->stock) }}"
                           class="w-full border rounded px-3 py-2 mt-1" required>
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('product.index') }}" class="text-gray-600 hover:underline mr-4">Batal</a>
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

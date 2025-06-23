<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Checkout</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-6 bg-white p-6 shadow rounded">
        @if (session('error'))
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('checkout.process') }}">
            @csrf

            <h3 class="text-lg font-semibold mb-3">Keranjang Anda:</h3>

            <ul class="mb-4 space-y-2">
                @forelse($cartItems as $item)
                    <li class="flex justify-between border-b py-2">
                        <span>{{ $item['name'] }} (x{{ $item['quantity'] }})</span>
                        <span>Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</span>
                    </li>
                @empty
                    <li class="text-gray-500">Keranjang kosong.</li>
                @endforelse
            </ul>

            <div class="text-right font-bold text-lg mb-6">
                Total: Rp {{ number_format($totalAmount, 0, ',', '.') }}
            </div>

            <div class="mb-4">
                <label for="jenis_pembayaran" class="block font-semibold mb-1">Metode Pembayaran</label>
                <select name="jenis_pembayaran" id="jenis_pembayaran" required class="w-full border px-3 py-2 rounded">
                    <option value="">-- Pilih --</option>
                    <option value="transfer_bank">Transfer Bank</option>
                    <option value="qris">QRIS</option>
                </select>
                @error('jenis_pembayaran')
                    <div class="text-red-600 mt-1 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-right">
                <button class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                    Checkout Sekarang
                </button>
            </div>
        </form>
    </div>
</x-app-layout>

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CheckoutController extends Controller
{
    public function showForm()
    {
        $cart = session()->get('cart', []);

        // Ambil ulang data produk dari DB untuk validasi harga
        $cartItems = collect($cart)->map(function ($item) {
            $product = \App\Models\Product::find($item['product_id']);
            return [
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => $product->price, // harga asli dari database
                'quantity' => $item['quantity'],
            ];
        });

        $totalAmount = $cartItems->sum(fn($item) => $item['price'] * $item['quantity']);

        return view('checkout.form', compact('cartItems', 'totalAmount'));
    }

    use AuthorizesRequests;
    public function process(Request $request)
    {
        $this->authorize('create', Order::class);

        $request->validate([
            'jenis_pembayaran' => 'required|in:transfer_bank,qris',
        ]);

        $cart = session()->get('cart', []);

        $cartItems = collect($cart)->map(function ($item) {
            $product = \App\Models\Product::find($item['product_id']);
            return [
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $item['quantity'],
            ];
        });

        $totalAmount = $cartItems->sum(fn($item) => $item['price'] * $item['quantity']);

        DB::beginTransaction();
        try {
            // dd(Auth::id());

            $order = Order::create([
                'user_id' => Auth::id(),
                'order_date' => now(),
                'status_pengiriman' => 'belum',
                'status_pembayaran' => 'belum_bayar',
                'payment_date' => null,
                'total_amount' => $totalAmount,
            ]);

            if (!$order) {
                throw new \Exception('Gagal membuat order: ' . json_encode($order));
            }

            foreach ($cartItems as $item) {
                OrderItem::create([
                    'id_order' => $order->id,
                    'id_product' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'subtotal' => $item['price'] * $item['quantity'],
                ]);
            }

            Payment::create([
                'id_order' => $order->id,
                'jenis_pembayaran' => $request->jenis_pembayaran,
                'status_pembayaran' => 'proses',
                'bukti_pembayaran' => null,
                'tanggal_pembayaran' => now(),
                'amount' => $totalAmount,
            ]);

            DB::commit();
            session()->forget('cart');
            return redirect()->route('checkout.success')->with('success', 'Checkout berhasil!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Gagal checkout: ' . $e->getMessage());
        }
    }
}

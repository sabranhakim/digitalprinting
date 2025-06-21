<?php

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('orderItems.product')->get();
        return view('order.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::all();
        return view('order.create', compact('products'));
    }

    public function store(Request $request)
    {
        // Simulasi order untuk 1 customer
        $order = Order::create([
            'id_customer' => Auth::user()->id_customer,
            'order_date' => now(),
            'status_pengiriman' => 'belum',
            'status_pembayaran' => 'belum_bayar',
            'total_amount' => 0,
        ]);

        $total = 0;
        foreach ($request->items as $item) {
            $product = Product::find($item['product_id']);
            $subtotal = $product->price * $item['quantity'];
            $total += $subtotal;

            OrderItem::create([
                'id_order' => $order->id_order,
                'id_product' => $product->id_product,
                'quantity' => $item['quantity'],
                'subtotal' => $subtotal,
            ]);
        }

        $order->update(['total_amount' => $total]);

        return redirect()->route('order.index')->with('success', 'Pesanan dibuat');
    }
}

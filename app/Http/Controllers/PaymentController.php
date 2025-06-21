<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create($orderId)
    {
        return view('payment.upload', compact('orderId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_order' => 'required|exists:orders,id_order',
            'jenis_pembayaran' => 'required|in:transfer_bank,qris',
            'bukti_pembayaran' => 'required|image',
            'amount' => 'required|numeric',
        ]);

        $path = $request->file('bukti_pembayaran')->store('bukti', 'public');

        Payment::create([
            'id_order' => $request->id_order,
            'jenis_pembayaran' => $request->jenis_pembayaran,
            'status_pembayaran' => 'proses',
            'bukti_pembayaran' => $path,
            'tanggal_pembayaran' => now(),
            'amount' => $request->amount,
        ]);

        return redirect()->route('order.index')->with('success', 'Pembayaran sedang diproses');
    }
}


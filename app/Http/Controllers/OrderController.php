<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Field;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fields = Field::where('available', 1)->get();
        return view('pelanggan.fields.index', compact('fields'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $tanggal = $request->input('tanggal', date('Y-m-d'));

        $fields = Field::where('available', true)->get();

        $orders = Order::where('tanggal', '>=', date('Y-m-d'))
                    ->where('tanggal', $tanggal)
                    ->get();

        return view('pelanggan.fields.create', compact('fields', 'orders', 'tanggal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'selections' => 'required|array|min:1',
        ]);

        $orderUniqueId = 'ORD-' . date('ymd') . '-' . strtoupper(\Str::random(4));
        $userId = auth()->id(); // atau sesuaikan jika user_id dikirim dari form

        foreach ($request->selections as $selection) {
            list($lapanganId, $jam) = explode('|', $selection);

            Order::create([
                'order_unique_id' => $orderUniqueId,
                'user_id' => $userId,
                'lapangan_id' => $lapanganId,
                'tanggal' => $request->tanggal,
                'jam' => $jam,
                'status' => 'pending',
            ]);
        }

        return redirect()->route('pelanggan.fields.data')->with('success', 'Pesanan berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function data_order()
    {
        $orders = \App\Models\Order::with('field') // Eager load relasi field
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('order_unique_id'); // Group by di collection (masih oke untuk tampilan)

        return view('pelanggan.fields.data', compact('orders'));
    }

    public function owner_data_order()
    {
        $orders = \App\Models\Order::with('field', 'user')
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('order_unique_id');


        return view('pemilik.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, $order_unique_id)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled'
        ]);

        // Update semua order dengan order_unique_id yg sama
        Order::where('order_unique_id', $order_unique_id)
            ->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui!');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $orders = Order::with('user')->paginate(10);
        // dd($orders);
        return view('dashboard.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $field = Field::where('slug', $request->field)->first();
            $order = Order::create([
                'field_id' => $field->id,
                'user_id' => Auth::user()->id,
                'order_code' => Order::generateOrderCode(),
                'order_date' => $request->tanggal,
                'amount' => $field->price,
                'is_promo' => $field->is_promo,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
            ]);
            // return redirect()->back()->with(['success' => 'Berhasil Membuat Pesanan', 'url' => route('admin.order.show', ['order' => $order->order_code])]);
            return response()->json([
                'url' => route('order.show', ['order' => $order->order_code]),
                'success' => 'Berhasil membuat pesanan',
            ], 200);
        } catch (\Throwable $th) {
            // return redirect()->back();
            return response()->json([
                'error' => true,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('dashboard.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data');
    }

    public function confirm(Request $req, Order $order)
    {
        $order->status = 'CONFIRMED';
        $order->update();
        return redirect()->back()->with('success', 'Berhasil Konfirmasi Order');
    }

    public function finished(Request $req, Order $order)
    {
        $order->status = 'FINISHED';
        $order->update();
        return redirect()->back()->with('success', 'Berhasil Selesaikan Order');
    }
    public function cancel(Request $req, Order $order)
    {
        $order->status = 'CANCELED';
        $order->update();
        return redirect()->back()->with('success', 'Berhasil Membatalkan Order');
    }
}

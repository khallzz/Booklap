<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except(['index']);
    }

    public function index()
    {
        $promo_fields = Field::where('is_promo', true)->get();
        $regular_fields = Field::where('is_promo', false)->get();
        // dd($regular_fields);
        return view('pages.user.field', compact('promo_fields', 'regular_fields'));
    }

    public function schedulePage(Request $req)
    {
        $fields = Field::all();
        return view('pages.user.schedule', compact('fields'));
    }

    public function orderIndex()
    {
        $orders = Auth::user()->orders;
        return view('pages.user.order', compact('orders'));
    }

    public function orderDetail(Request $req, Order $order)
    {
        return view('pages.user.order-detail', compact('order'));
    }

    public function uploadPaymentReceipt(Request $req, Order $order)
    {
        $file = $req->file('payment_receipt');
        // dd($req->all());
        if (!is_null($order->payment_receipt) && Storage::exists($order->payment_receipt)) {
            Storage::delete($order->payment_receipt);
        }
        $path = Storage::disk('public')->put('payment_receipts', $file);
        $order->payment_receipt = $path;
        $order->update();
        return redirect()->back()->with('success', 'Berhasil Upload Bukti Pembayaran!');
    }

    public function checkSchedule(Request $req, Field $field)
    {
        $orders = Order::where('field_id', $field->id)->where('order_date', $req->tanggal)->where('status', '!=', 'CANCELED')->get(['start_time', 'end_time']);
        return response()->json([
            'orders' => $orders,
        ]);
    }
}

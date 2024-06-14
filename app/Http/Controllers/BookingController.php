<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Order;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['orderIndex']);
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
        $orders = Order::all();
        return view('pages.user.order', compact('orders'));
    }

    public function orderDetail(Request $req, Order $order)
    {
        return view('pages.user.order-detail', compact('order'));
    }
}

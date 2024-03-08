<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function manage_order()
    {
        $order = Order::all();
        return view('admin.dashboard.order.index', compact('order'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;

class OrderController extends Controller
{
    #<----======= Make User Login Guard ========----->
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    #<----======= Show Order details page ========----->
    public function index()
    {
        $orders = Order::latest()->get();
        return view('Admin.order.index',compact('orders'));
    }
    #<----======= View Order ========----->
    public function view($id)
    {
        $orders = Order::findOrFail($id);
        $orderitems = OrderItem::where('order_id',$id)->get();
        $shipping = Shipping::where('order_id',$id)->first();
        return view('Admin.order.view',compact('orders','orderitems','shipping'));
    }

}

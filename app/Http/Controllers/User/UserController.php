<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;

class UserController extends Controller
{    
    # User Order Show
    public function order()
    {
        $orders = Order::where('user_id',Auth::id())->latest()->get();
        return view('User.order',compact('orders'));
    }
     # User Order View
    public function order_view($id)
    {
        $orders = Order::findOrFail($id);
        $orderitems = OrderItem::with('product')->where('order_id',$id)->get();
        $shipping = Shipping::where('order_id',$id)->first();
        return view('User.order_view',compact('orders','orderitems','shipping'));
    }

}

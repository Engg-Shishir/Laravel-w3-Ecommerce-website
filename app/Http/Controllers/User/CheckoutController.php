<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;


class CheckoutController extends Controller
{    
    # Checkout home page
    public function home()
    {
        $total = Cart::all()->where('user_ip', Request()->ip())->sum(function($t){
          return $t->price * $t->qty;
        });
        return view('Frontend.pages.checkout',compact('total'));
    }
    # Place Order
    public function place_order(Request $request)
    {
        if($request->total<1)
        {
            return back()->with('error','You Going to wrong process with $0');
        }else{
            #<-------===== Custom Validation Message ======------>
            $request->validate([
                'ship_first_name' => 'required',
                'ship_last_name' => 'required',
                'shipping_phone' => 'required',
                'shipping_email' => 'required',
                'address' => 'required',
                'state' => 'required',
                'post_code' => 'required',
                'payment_type' => 'required',
            ],[
                'ship_first_name.required' => 'Enter First Name',
                'ship_last_name.required' => 'Enter Last Name',
                'shipping_phone.required' => 'Enter Phone No',
                'shipping_email.required' => 'Enter Your Email',
                'address.required' => 'Enter Shipping Address',
                'state.required' => 'Enter State',
                'post_code.required' => 'Enter Post Code',
                'payment_type.required' => 'Select Payment Type',
            ]);
            $order_id = Order::insertGetId([
                'user_id' => Auth::id(),
                'invoice_no' => mt_rand(100000000,999999999999),
                'payment_type' => $request->payment_type,
                'subtotal' =>  $request->subtotal,
                'total' =>  $request->total,
                'cupon_discount' =>  $request->cupon_discount,
                'created_at' =>  Carbon::now(),
            ]);
            $carts = Cart::where('user_ip',request()->ip())->latest()->get();
            foreach ($carts as $cart) {
                OrderItem::insert([
                'order_id' => $order_id,
                'product_id'=> $cart->pro_id,
                'pro_quatity'=>$cart->qty,
                'created_at' =>  Carbon::now()
                ]);
            }
            Shipping::insert([
                'order_id' =>  $order_id,
                'ship_first_name' =>  $request->ship_first_name,
                'ship_last_name' =>  $request->ship_last_name,
                'ship_email' =>  $request->shipping_email,
                'ship_phone' =>  $request->shipping_phone,
                'address' =>  $request->address,
                'state' =>  $request->state,
                'post_code' =>  $request->post_code,
                'created_at' =>  Carbon::now(),
            ]);
            if(Session::has('cupon'))
            {
                session()->forget('cupon');
            }
            Cart::where('user_ip',request()->ip())->delete();
            return Redirect()->to('/order/success')->with('order_compleate',' Successfully Order Complited');

        }
    }
    public function order_success()
    {
      return view('Frontend.pages.order_success');
    }
}

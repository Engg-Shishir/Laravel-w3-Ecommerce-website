<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\User;
use Intervention\Image\ImageManager;
use Image;



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

    # User profile update
    public function profileUpdate(Request $request, $id)
    {
        #<-------===== Custom Validation Message ======------>
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ],[
            'name.required' => 'Enter user name',
            'email.required' => 'Enter your email',
        ]);
        if($request->profile)
        {
            if($request->old)
            {
                unlink($request->old);
            }
            $profile = $request->file('profile');
            $name = $id .'_'. hexdec(uniqid()).'.'.$profile->getClientOriginalExtension();
            Image::make($profile)->save('backend/img/User/'.$name);
            $url = 'backend/img/User/'.$name;

            User::find($id)->update([
                'name'  => $request->name,
                'email' => $request->email,
                'photo' => $url,
                'updated_at' => Carbon::now()
            ]);
        }else{
            User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'updated_at' => Carbon::now()
            ]);
        }
        return back()->with('success','Profile Updated');
    }


    


}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    # Add to Wishlist
    public function addToWishlist($id)
    {
        if(Auth::check())
        {
            $check = Wishlist::where('product_id',$id)->where('user_id',Auth::id())->first();
            if($check)
            {
              return back()->with('error',' Priduct Allready Added In Wishlist');
            }else{
                $check = Cart::where('pro_id',$id)->where('user_ip',request()->ip())->first();
                if($check)
                {
                  return back()->with('error',' Priduct Allready Added In Cart');
                }else{
                  Wishlist::insert([
                    'product_id'=> $id,
                    'user_id'=> Auth::id(),
                  ]);
                  return back()->with('success',' Priduct added on Wishlist');
                }
            }
        }else{
            return Redirect()->route('login')->with('error','You Should Login First');
        }
    }
    #<-------===== Wishlist Home ======------>
    public function home()
    {
      $wishlists = Wishlist::where('user_id',Auth::id())->latest()->get();
      return view('Frontend.pages.wishlist', compact('wishlists'));
    }
    #<-------===== Wishlist Delete ======------>
    public function remove($id)
    {
        Wishlist::where('id',$id)->delete();
        return back()->with('error','You Remove A WishList');
    }
}

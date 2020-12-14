<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class FrontendController extends Controller
{    
    #<----======= Frontend Index Page ========----->
    public function index()
    {
        $products = Product::where('status',1)->latest()->get();
        $categoris = Category::where('status',1)->latest()->get();
        return view('Frontend.pages.home',compact('products','categoris'));
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;

class FrontendController extends Controller
{    
    #<----======= Frontend Index Page ========----->
    public function index()
    {
        $products = Product::where('status',1)->latest()->get();
        $categoris = Category::where('status',1)->latest()->get();
        return view('Frontend.pages.home',compact('products','categoris'));
    }
    #<----======= Shop page ========----->
    public function shopage()
    {
       $products = Product::latest()->get();
       $productsp = Product::latest()->paginate(3);
       $brands = Brand::where('status',1)->latest()->get();
       return view('Frontend.pages.shop',compact('products','brands','productsp'));
    }
    #<----======= Categorys product page ========----->
    public function CategoryProduct($id)
    {
        $products = Product::where('category_id',$id)->latest()->paginate(9);
        return view('Frontend.pages.categoryshop',compact('products'));
    }
    #<----======= Brand product page ========----->
    public function BrandProduct($id)
    {
        $products = Product::where('brand_id',$id)->latest()->paginate(9);
        return view('Frontend.pages.brandshop',compact('products'));
    }

}

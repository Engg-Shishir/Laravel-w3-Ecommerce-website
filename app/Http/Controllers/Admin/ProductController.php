<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Image;

class ProductController extends Controller
{    
    #<----======= Show Add Product Form ========----->
    public function product_form_show()
    {
        $categorys = Category::all();
        $brands = Brand::all();
        return view('Admin.product.product_form_show',compact('categorys','brands'));
    }
    #<----======= Store Product ========----->
    public function store(Request $request)
    {
        #<-------===== Custom Validation Message ======------>
        $request->validate([
            'pro_name' => 'required|max:255',
            'pro_code' => 'required|max:255',
            'price' => 'required|max:255',
            'quantity' => 'required|max:255',
            'cat_id' => 'required|max:255',
            'brand_id' => 'required|max:255',
            'short_descrip' => 'required',
            'long_descrip' => 'required',
            'image_one' => 'required|mimes:jpg,jpeg,png,gif',
            'image_two' => 'required|mimes:jpg,jpeg,png,gif',
            'image_three' => 'required|mimes:jpg,jpeg,png,gif',
        ],[
            'pro_name.required' => 'Enter product name',
            'pro_code.required' => 'Enter product code',
            'price.required' => 'Enter product price',
            'quantity.required' => 'Select product quantity',
            'cat_id.required' => 'Select category',
            'brand_id.required' => 'Select brand',
            'short_descrip.required' => 'Enter short description',
            'long_descrip.required' => 'Enter long description',
            'image_one.required' => 'Chose thumbnail image',
            'image_two.required' => 'Chose image',
            'image_three.required' => 'Chose image',
        ]);

        $img_one = $request->file('image_one');
        $name_one = hexdec(uniqid()).'.'.$img_one->getClientOriginalExtension();
        Image::make($img_one)->resize(270,270)->save('frontend/img/product/upload/'.$name_one);
        $img_url1 = 'frontend/img/product/upload/'.$name_one;

        $img_two = $request->file('image_two');
        $name_two = hexdec(uniqid()).'.'.$img_two->getClientOriginalExtension();
        Image::make($img_two)->resize(270,270)->save('frontend/img/product/upload/'.$name_two);
        $img_url2 = 'frontend/img/product/upload/'.$name_two;


        $img_three = $request->file('image_three');
        $name_three = hexdec(uniqid()).'.'.$img_three->getClientOriginalExtension();
        Image::make($img_three)->resize(270,270)->save('frontend/img/product/upload/'.$name_three);
        $img_url3 = 'frontend/img/product/upload/'.$name_three;


        Product::insert([
            'pro_name'=> $request->pro_name,
            'pro_slug'=> strtolower(str_replace(' ','-',$request->pro_name)),
            'pro_code'=> $request->pro_code,
            'price'=> $request->price,
            'pro_quantity'=> $request->quantity,
            'category_id'=> $request->cat_id,
            'brand_id'=> $request->brand_id,
            'short_descrip'=> $request->short_descrip,
            'long_descrip'=> $request->long_descrip,
            'image_one'=> $img_url1,
            'image_two'=> $img_url2,
            'image_three'=> $img_url3,
            'created_at' => Carbon::now(),
        ]);
    
        return back()->with('success','Product Inserted');
        
    }
    #<----=======  Manage Product  ========----->
    public function manage()
    {
        $products = Product::orderBy('id','DESC')->get();
        return view('Admin.product.manage',compact('products'));
    } 
    #---====== Product Delete ======------>  
    public function delete($id)
    {
        Product::find($id)->delete();
        return back()->with('error','Product Deleted');
    }
    #<---====== Product Edit ======------>
    public function edit($id)
    {
        $categorys = Category::all();
        $brands = Brand::all();
        $get = Product::findOrFail($id);
        return view('Admin.product.edit', compact('get','brands','categorys'));
    }
    #<-------===== Update Product ======------>
    public function update(Request $request)
    {
        #<-------===== Custom Validation Message ======------>
        $request->validate([
            'pro_name' => 'required|max:255',
            'pro_code' => 'required|max:255',
            'price' => 'required|max:255',
            'quantity' => 'required|max:255',
            'cat_id' => 'required|max:255',
            'brand_id' => 'required|max:255',
            'short_descrip' => 'required',
            'long_descrip' => 'required',
        ],[
            'pro_name.required' => 'Enter product name',
            'pro_code.required' => 'Enter product code',
            'price.required' => 'Enter product price',
            'quantity.required' => 'Select product quantity',
            'cat_id.required' => 'Select category',
            'brand_id.required' => 'Select brand',
            'short_descrip.required' => 'Enter short description',
            'long_descrip.required' => 'Enter long description',
        ]);

        Product::findOrfail($request->id)->update([
            'pro_name'=> $request->pro_name,
            'pro_slug'=> strtolower(str_replace(' ','-',$request->pro_name)),
            'pro_code'=> $request->pro_code,
            'price'=> $request->price,
            'pro_quantity'=> $request->quantity,
            'category_id'=> $request->cat_id,
            'brand_id'=> $request->brand_id,
            'short_descrip'=> $request->short_descrip,
            'long_descrip'=> $request->long_descrip,
            'updated_at' => Carbon::now(),
        ]);
        return Redirect()->route('manage_product')->with('message','Product Updated');
    }
    #<-------===== Update Product Image ======------>
    public function product_update_image(Request $request)
    {
        
        #<-------===== Custom Validation Message ======------>
        $request->validate([
            'image_one' => 'required|mimes:jpg,jpeg,png,gif',
            'image_two' => 'required|mimes:jpg,jpeg,png,gif',
            'image_three' => 'required|mimes:jpg,jpeg,png,gif',
        ],[
            'image_one.required' => 'Chose thumbnail image',
            'image_two.required' => 'Chose image',
            'image_three.required' => 'Chose image',
        ]);

        $one = $request->old_one;
        $two = $request->old_two;
        $three = $request->old_three;
        
        if($one && $two && $three)
        {
            unlink($one);
            unlink($two);
            unlink($three);


            $img_one = $request->file('image_one');
            $name_one = hexdec(uniqid()).'.'.$img_one->getClientOriginalExtension();
            Image::make($img_one)->resize(270,270)->save('frontend/img/product/upload/'.$name_one);
            $img_url1 = 'frontend/img/product/upload/'.$name_one;
    
            $img_two = $request->file('image_two');
            $name_two = hexdec(uniqid()).'.'.$img_two->getClientOriginalExtension();
            Image::make($img_two)->resize(270,270)->save('frontend/img/product/upload/'.$name_two);
            $img_url2 = 'frontend/img/product/upload/'.$name_two;
    
    
            $img_three = $request->file('image_three');
            $name_three = hexdec(uniqid()).'.'.$img_three->getClientOriginalExtension();
            Image::make($img_three)->resize(270,270)->save('frontend/img/product/upload/'.$name_three);
            $img_url3 = 'frontend/img/product/upload/'.$name_three;
            
            Product::findOrfail($request->id)->update([
                'image_one'=> $img_url1,
                'image_two'=> $img_url2,
                'image_three'=> $img_url3,
                'updated_at' => Carbon::now(),
            ]);
            return Redirect()->route('manage_product')->with('success','Product Image Updated');
        }else{
            return back()->with('error','Something is wrong');

        }
    }
    #<---====== Product Status Manage ======------>
    public function status($pid,$status)
    {
        if($status == 1){
            Product::find($pid)->update([
                'status' => 0,
                'updated_at' => Carbon::now()
            ]);
        return back()->with('error',' Status Updated ');

        }else{
            Product::find($pid)->update([
                'status' => 1,
                'updated_at' => Carbon::now()
            ]);
            return back()->with('success',' Status Updated');

        }

    }
    
}

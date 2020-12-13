<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{   
    #<----======= Make User Login Guard ========----->
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    #<-------===== Show categor page ======------>
    public function index()
    {
        $categories = Category::latest()->get();
        return view('Admin.category.index',compact('categories'));
    }
    #<-------===== Store Category ======------>
    public function store(Request $request)
    {
        #<-------===== Custom Validation success ======------>
        $request->validate([
            'cat_name' => 'required|unique:categories,cat_name',
        ],[
            'cat_name.required' => 'Enter Category Name',
        ]);
        
        Category::insert([
            'cat_name' => $request->cat_name,
            'created_at' => Carbon::now()
        ]);
    
        return back()->with('success','Category Inserted');
    }
    #<-------===== Delete Category ======------>
    public function delete($id)
    {
        Category::find($id)->delete();
        return back()->with('error','Category Deleted');
    }
    #<---====== Category Edit ======------>
    public function edit($id)
    {
        $get = Category::findOrFail($id);
        return view('Admin.category.edit', compact('get'));
    }
    #<-------===== Update Category ======------>
    public function update(Request $request)
    {
        #<-------===== Custom Validation success ======------>
        $request->validate([
            'cat_name' => 'required|unique:categories,cat_name',
        ],[
            'cat_name.required' => 'Enter Category Name',
        ]);
        
        Category::find($request->cat_id)->update([
            'cat_name' => $request->cat_name,
            'updated_at' => Carbon::now()
        ]);
    
        return Redirect()->route('admin.categorys')->with('success','Category Updated');
    }
    #<---====== Category Status Manage ======------>
    public function status($cid,$status)
    {
        if($status == 1){
            Category::find($cid)->update([
                'status' => 0,
                'updated_at' => Carbon::now()
            ]);

        }else{
            Category::find($cid)->update([
                'status' => 1,
                'updated_at' => Carbon::now()
            ]);

        }

        return back()->with('success',' Status Updated');
    }

    
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cupon;
use Carbon\Carbon;

class CuponController extends Controller
{
    #<----======= Make User Login Guard ========----->
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    #<-------===== Show cupon page ======------>
    public function index()
    {
        $cupons = Cupon::latest()->get();
        return view('Admin.cupon.index',compact('cupons'));
    }
    #<-------===== Store Cupon ======------>
    public function store(Request $request)
    {
        #<-------===== Custom Validation Message ======------>
        $request->validate([
            'cupon_name' => 'required|unique:cupons,cupon_name',
            'discount' => 'required|unique:cupons,discount',
        ],[
            'cupon_name.required' => 'Enter Cupon name',
            'discount.required' => 'Enter Cupon discount',
        ]);
        
        Cupon::insert([
            'cupon_name' => $request->cupon_name,
            'discount' => $request->discount,
            'created_at' => Carbon::now()
        ]);
    
        return back()->with('success','Cupon Inserted Successfully');
    }
    #<-------===== Delete Cupon ======------>
    public function delete($id)
    {
        Cupon::find($id)->delete();
        return back()->with('error','Cupon Deleted');
    }
    #<---====== Cupon Edit ======------>
    public function edit($id)
    {
        $get = Cupon::findOrFail($id);
        return view('Admin.cupon.edit', compact('get'));
    }
    #<-------===== Update Cupon ======------>
    public function update(Request $request)
    {
        #<-------===== Custom Validation Message ======------>
        $request->validate([
            'cupon_name' => 'required|unique:cupons,cupon_name',
            'discount' => 'required|unique:cupons,discount',
        ],[
            'cupon_name.required' => 'Enter cupon name',
            'disount.required' => 'Enter Cupon Discount',
        ]);
        
        Cupon::find($request->cupon_id)->update([
            'cupon_name' => $request->cupon_name,
            'discount' => $request->discount,
            'updated_at' => Carbon::now()
        ]);
    
        return Redirect()->route('admin.cupon')->with('success','Cupon Updated Successfully');
    }
    #<---====== Cupon Status Manage ======------>
    public function status($cid,$status)
    {
        if($status == 1){
            Cupon::find($cid)->update([
                'status' => 0,
                'updated_at' => Carbon::now()
            ]);

            return back()->with('error',' Status Inactive');

        }else{
            Cupon::find($cid)->update([
                'status' => 1,
                'updated_at' => Carbon::now()
            ]);

            return back()->with('success',' Status Active');

        }
    }

    
}

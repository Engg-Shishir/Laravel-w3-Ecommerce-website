<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class UsersController extends Controller
{    
    #<-------===== Show Users page ======------>
    public function index()
    {
        $users = User::latest()->get();
        return view('Admin.user.index',compact('users'));
    }    
    #<---====== Admin user Status Manage ======------>
    public function status($uid,$status)
    {
        if($status == 1){
            User::find($uid)->update([
                'status' => 0,
                'updated_at' => Carbon::now()
            ]);
        return back()->with('error',' Status Updated ');

        }else{
            User::find($uid)->update([
                'status' => 1,
                'updated_at' => Carbon::now()
            ]);
            return back()->with('success',' Status Updated');

        }

    }
}

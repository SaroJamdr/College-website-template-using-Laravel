<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(){
        return view('backend.login');
    }
    public function check(Request $request){
        
        $credential = $request->only('email','password');
        if(Auth::guard('admin')->attempt($credential))
        {
            return redirect()->route('admin.dashboard');
        }
        else{
            return "Something went wrong";
        }
    }

    public function logout(){
        return redirect()->route('admin.login');
    }

    public function list(){
        $users = Admin::where('id','!=',Auth::user()->id)->get();
        return view('Backend.include.userlist', compact('users'));
    }


    public function listad()
    {
        $admin = Admin::all();
        return view('Backend.adminlist', compact('admin'));
    }

    public function store(Request $request)
    {
        $admin = new Admin();
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $admin->image = $imageName;

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->save();
        return back()->with('success','Item created successfully!');
    }

    public function delete(Admin $admin)
    {
        if (!empty($admin->image)) {
        unlink(public_path('images/' . $admin->image));
    }
        $admin->delete();
        return back()->with('danger','Item deleted successfully!');
    }


    

}

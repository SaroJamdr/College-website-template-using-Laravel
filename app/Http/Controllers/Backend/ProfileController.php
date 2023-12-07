<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile(){
        return view('Backend.userprofile');
    }
    public function changepassword(){
        return view('Backend.changepassword');
    }

    public function update(Request $request, Admin $admin) {
        if($request->new_pass == $request->con_pass)
        {
            $admin->password =bcrypt($request->new_pass);
            $admin->save();
        }
        else
        {
            return back()->with('warning','Password does not match !!!');
        }
        return back()->with('success','Password Changed Succesefully');
    }

    public function edit(Request $request, Admin $admin){
        // dd($request);
        if (!empty($request->oldimage && $request->file('image')))
        {
            unlink(public_path('images/' . $request->oldimage));
            $imageName = time(). '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }
        else if(!empty($request->file('image')))
        {
            $imageName = time(). '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }
        else
        {
            $imageName = $request->oldimage;
        }

        $admin->image = $imageName;
        
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();
        return back()->with('success','profile updated succesfully');
    }


}

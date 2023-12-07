<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(){
        $slider = Slider::all();
        return view('Backend.Content.sliderList', compact('slider'));
    }

    public function store(Request $request){
        $slider = new Slider();
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $slider->image = $imageName;
        $slider->h1 = $request->h1;
        $slider->h2 = $request->h2;
        $slider->h3 = $request->h3;
        $slider->save();
        // return back()->with('success','Slider added succesfully.');
        return redirect()->back();
    }

    
    public function edit(Request $request, Slider $slider){
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

        $slider->image = $imageName;
        
        $slider->name = $request->name;
        $slider->email = $request->email;
        $slider->save();
        return back()->with('success','profile updated succesfully');
    }

    public function delete(Slider $slider)
    {
        if (!empty($slider->image)) {
        unlink(public_path('images/' . $slider->image));
    }
        $slider->delete();
        return back()->with('danger','Item deleted successfully!');
    }

}

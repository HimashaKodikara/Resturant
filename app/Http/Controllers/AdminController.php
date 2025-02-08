<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class AdminController extends Controller
{
  public function add_food(){
    return view('admin.add_food');
  }

  public function upload_food(Request $request)
  {
    try{
       $data = new Food;

       $data->title = $request->title;
       $data->details = $request->details;
       $data->price = $request->price;
       $image = $request->img;

       $filename = time().'.'.$image->getClientOriginalExtension();

       $request->img->move('food_img',$filename);

       $data->image = $filename;

       $data->save();

        return redirect()->back()->with('success','Updated Sucessfuly');
    }
    catch(Exception $e){

        return redirect()->back()->with('error','Upload Error');
    }

  }

  public function view_food(){
    $data = Food::all();
    return view('admin.show_food',compact('data'));
  }
}

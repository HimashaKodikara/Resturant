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

       $filename = time().'.'.$image->getClientOriginalExtention();

       $data->save();

        return redirect()->back()->with('success','Updated Sucessfuly');
    }
    catch(Exception $e){

        return redirect()->back()->with('error','Upload Error');
    }

  }
}

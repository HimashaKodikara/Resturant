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
       $data = new Food;

       $data->tilte = $request->title;
       $data->detail = $request->details;
       $data->price = $request->price;

       $data->save();

        return redirect()->back();


  }
}

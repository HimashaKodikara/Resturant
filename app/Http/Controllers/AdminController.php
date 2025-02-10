<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Book;
use App\Models\Order;

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

  public function delete_food($id){
    try{
        $data = Food::find($id);

        $data->delete();

        return redirect()->back();
    }catch(Exception $e){
        return redirect()->back()->with('error','Upload Error');

    }
  }

  public function update_food($id){


    $food = Food::find($id);
  return view('admin.update_food',compact('food'));
  }

  public function edit_food(Request $request,$id){
    try{
        $data = Food::find($id);

        $data->title = $request->title;
        $data->details = $request->details;
        $data->price = $request->price;

        $image = $request->image;

        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('food_img',$imagename);

            $data->image = $imagename;
        }

        $data->save();
}
catch(Exception $e){
        return redirect()->back()->with('error','Upload Error');
}


  }

  public function Orders()
  {
    $data = Order::all();
    return view ('admin.order',compact('data'));
  }

  public function on_the_way($id)
  {
    $data = Order::find($id);
    $data->delivary_status = "On the Way";
    $data->save();
    return redirect()->back();


  }
  public function delivered($id)
  {
    $data = Order::find($id);
    $data->delivary_status = "delivered";
    $data->save();
    return redirect()->back();


  }
  public function cancel($id)
  {
    $data = Order::find($id);
    $data->delivary_status = "cancel";
    $data->save();
    return redirect()->back();

  }

  public function reservations()
  {
    $books = Book::all();

    return view('admin.reservations',compact('books'));
  }
}

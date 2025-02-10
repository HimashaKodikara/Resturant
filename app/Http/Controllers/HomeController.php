<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Food;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Book;


use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{


    public function my_home(){
     $data = Food::all();

        return view('home.index',compact('data'));
    }
   public function index()
   {
    try{
        if(Auth::id())
        {
            $usertype = Auth()->user()->usertype;

            if($usertype=='user')
            {
                $data = Food::all();

                return view('home.index',compact('data'));
            }
            else{
                $total_user = User::where('usertype','=','user')->count();
                return view('admin.index',compact('total_user'));
            }
        }
}
   catch(Exception $e){
      return redirect()->back()->with('error','Upload Error');
}

   }

   public function add_cart(Request $request,$id)
   {
    try{
    if(Auth::id()){
        $food = Food::find($id);

        $cart_title = $food->title;
        $cart_details = $food->details;
        $cart_price = $food->price;
        $cart_image = $food->image;

         $data = new Cart;
         $data->title = $cart_title;
         $data->details = $cart_details;

         $data->price = $cart_price * $request->quantity;

         $data->image = $cart_image;
         $data->quantity = $request->quantity;
         $data->userid = Auth()->user()->id;
         $data->save();

         return redirect()->back();


    }
    else{
        return redirect("login");
    }
}catch(Exception $e){
    return redirect()->back()->with('error','Upload Error');
}
   }


   public function my_cart(){

        $user_id = Auth()->user()->id;
        $data = Cart::where('userid','=',$user_id)->get();
        return view('home.my_cart',compact('data'));
   }

   public function remove_cart($id){
    $data = Cart::find($id);

    $data->delete();

    return redirect()->back();
   }

   public function confirm_order(Request $request)
   {
    $user_id = Auth()->user()->id;

    $cart = Cart::where('userid','=',$user_id)->get();

    foreach($cart as $cart){
     $order = new Order;
     $order->name = $request->name;
     $order->email = $request->email;

     $order->phone = $request->phone;

     $order->address = $request->address;
     $order->title = $cart->title;
     $order->quantity = $cart->quantity;
     $order->price = $cart->price;
     $order->image = $cart->image;
     $order->save();
     $data = Cart::find($cart->id);
     $data->delete();



    }
    return redirect()->back();
   }

   public function book_table(Request $request){
  $data = new Book;
  $data->phone = $request->phone;
  $data->phone = $request->m_guest;
  $data->phone = $request->time;
  $data->phone = $request->date;

  $data->save();

  return redirect()->back();


   }


}

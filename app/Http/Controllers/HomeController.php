<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Food;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    public function my_home(){
     $data = Food::all();

        return view('home.index',compact('data'));
    }
   public function index()
   {
    if(Auth::id())
    {
        $usertype = Auth()->user()->usertype;

        if($usertype=='user')
        {
            $data = Food::all();

            return view('home.index',compact('data'));
        }
        else{
            return view('admin.index');
        }
    }

   }

   public function add_cart(Request $request,$id)
   {
    if(Auth::id()){
        $food = Food::find($id);

        $cart_title = $food->title;
        $cart_details = $food->details;
        $cart_price = $food->price;
        $cart_image = $food->image;

         $data = new Cart;
         $data->title = $cart_title;
         $data->details = $cart_details;

         $data->price = $cart_price;

         $data->image = $cart_image;
         $data->quantity = $request->quantity;
         $data->save();

         return redirect()->back();


    }
    else{
        return redirect("login");
    }
   }
}

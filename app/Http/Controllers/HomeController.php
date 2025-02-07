<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    public function my_home(){
        return view('home.index');
    }
   public function index()
   {
    if(Auth::id())
    {
        $usertype = Auth()->user()->usertype;

        if($usertype=='user')
        {
            return view('dashboard');
        }
        else{
            return view('admin.index');
        }
    }

   }
}

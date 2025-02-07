<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;



route::get('/',[HomeController::class,'my_home']);


// Make access control
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    route::get('/home',[HomeController::class,'index']);

});

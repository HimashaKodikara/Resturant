<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;



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

    route::get('/add_food',[AdminController::class,'add_food']);
    route::get('/view_food',[AdminController::class,'view_food']);
    route::get('/delete_food/{id}',[AdminController::class,'delete_food']);
    route::get('/update_food/{id}',[AdminController::class,'update_food']);
    route::post('/edit_food/{id}',[AdminController::class,'edit_food']);
    route::post('/add_cart/{id}',[HomeController::class,'add_cart']);

    route::get('/my_cart',[HomeController::class,'my_cart']);


    route::post('/upload_food',[AdminController::class,'upload_food']);


});

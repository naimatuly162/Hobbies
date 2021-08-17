<?php

use App\Http\Controllers\HobbiesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/hobbies/{name}',function(){
    return redirect('/');
})->where('name','[A-Za-z]+');



Route::get('/', [HobbiesController::class, 'index']);

Route::post('getData',[HobbiesController::class,'getData']);

Route::resource('hobbies',HobbiesController::class);

Route::post( 'hobbies/{hobbies}', [HobbiesController::class,'destroy']);



<?php

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

Route::get('/', function () {
    return view('welcome');
});


//Route::get('test',function (){
//    $reviews = \App\Models\Review::whereIn('star',[0,6])->get();
//    foreach ($reviews as $review){
//       $review->star = 2;
//       $review->save();
//    }
//});

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/blog' , function () {
    return "Hello World";
});
Route::get('/array' , function () {
    return [
        "firstName" => 'Jalil',
        "lastName" => 'Betroji',
    ];
});
Route::get('/request' , function (Request $request) {
    return [
        "name" =>$request->input("name"),
        "age" => $request->input('age' , 23),
        "filepath" => $request->path(),
        "url" => $request->url(),
    ];
});
Route::prefix('/slug')->group(function (){
    Route::get('' , function(Request $request){
   return [
        "link" => \route('slug.show' , ["slug" => 'article' , 'id' => 13]),
   ];
})->name('slug.index');
Route::get('{slug}/{id}' , function(string $slug , string $id ,Request $request){
    return [
        "slug" => $slug,
        "id" => $id,
    ];
})->where([
    "slug" =>'[a-z0-9\-]+',
    "id" => '[0-9]+'
])->name('slug.show');});


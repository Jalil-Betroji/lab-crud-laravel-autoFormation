<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Post;
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
Route::prefix('/blog')->name('blog.')->group(function(){
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('/{slug}/{id}', [PostController::class, 'show'])->where([
        'id'=>'[0-9]+',
        'slug' => '[a-z0-9\-]+'
    ])->name('show');

});
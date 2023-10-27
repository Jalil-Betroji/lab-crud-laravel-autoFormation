<?php

use App\Http\Controllers\StagiaireController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [StagiaireController::class , 'showData'])->name('show.stagiaires');
Route::get('/add/stagiaire' , function(){
    return view('add');
})->name('add.stagiaire');
Route::post('/' , [StagiaireController::class , 'addStagiaire'])->name('add.stagiaires');
Route::get('/edit/{id}' , [StagiaireController::class , 'edit'])->name('edit.stagiaire');
Route::PATCH('/edit/{id}' , [StagiaireController::class , 'updateStagiaire'])->name('update.stagiaire');
Route::get('/delete/{id}' , [StagiaireController::class , 'deleteStagiaire'])->name('delete.stagaire');
Route::post('/search-stagiaire' , [StagiaireController::class , 'searchStagiaire'] );
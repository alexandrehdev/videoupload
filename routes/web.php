<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VideoController;

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



Route::get('/', [HomeController::class,'index'])->name('index');


Route::post("/upload", [VideoController::class,'upload'])->name("upload");

Route::get('/videos', [VideoController::class, 'show'])
->name('show');

Route::group(['prefix' => 'cadastro','as' => 'register.'], function(){
    Route::get('/',[RegisterController::class, 'index'])->name('show');
    Route::post('/save',[RegisterController::class, 'store'])->name('store');
});




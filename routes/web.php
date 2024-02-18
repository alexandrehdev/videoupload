<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\FaqController;

use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::get('/test',function(){
    return view('pages.test');
});

Route::get('/', [HomeController::class,'index'])->middleware('auth')->name('index');


Route::post("/upload", [VideoController::class,'upload'])->name("upload");

Route::get('/videos', [VideoController::class, 'show'])->middleware('auth')->name('show');

Route::group(['prefix' => 'cadastro','as' => 'register.'], function(){
    Route::get('/',[RegisterController::class, 'index'])->name('show');
    Route::post('/cadastrar',[RegisterController::class, 'store'])->name('store');
});


Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/auth',[LoginController::class,'authenticate'])->name('auth');

Route::post('/logout',[LoginController::class,'logout'])->name('logout');

Route::group(['prefix' => 'perfil','as' => 'profile.'], function(){
    Route::get('/',[UserController::class,'profile'])->middleware('auth')->name('show');
    Route::put('/atualizar/{id}',[UserController::class,'updateProfile'])->name('update');
});

Route::group(['prefix' => "configuracoes",'as' => "settings."],function(){
    Route::get('/',[SettingsController::class,"show"])->middleware('auth')->name('show');
});

Route::group(['prefix' => "ajuda", 'as' => "faq."],function(){
    Route::get('/',[FaqController::class,"index"])->name('index');
});

Route::group(['prefix' => "email","as"=> "verification."], function(){

    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->middleware('auth')->name('notice');

    Route::get("/email/verify/{id}/{hash}", function(EmailVerificationRequest $request){
        $user = $request->user()->markEmailAsVerified();
        $request->fulfill();
        
        return view('pages.auth.login');
    })->middleware(['auth', 'signed'])->name('verify');
});   








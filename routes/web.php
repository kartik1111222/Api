<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MessageController;
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

// Route::get('/', [LoginController::class, 'login'])->name('login');
// Route::post('/', [LoginController::class, 'login_check'])->name('login_check');
// Route::get('logout', [LoginController::class,'logout'])->name('logout');

// Route::prefix('user')->name('user.')->group(function(){
//    Route::get('dashboard', [LoginController::class,'dashboard'])->name('dashboard');
//    Route::get('message/index', [MessageController::class, 'index'])->name('message');
//    Route::get('message/send', [MessageController::class, 'send'])->name('messagesend');
// });

Route::get('/', function(){
return view('welcome');
});

Route::get('test', function () {
	event(new App\Events\StatusLiked('Someone'));
	return "Event has been sent!";
});

Route::resource('categories', CategoryController::class);



<?php

use App\Events\StatusLiked;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;
use App\Events\TestEvent;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ManageroleController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\API\Admin\UserController;
use App\Http\Controllers\Admin\UserController as WebuserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/', [LoginController::class, 'login_check'])->name('login_check');
Route::get('logout', [LoginController::class,'logout'])->name('logout');

Route::resource('product', ProductController::class);

Route::prefix('admin')->name('admin.')->group(function(){
  Route::middleware('auth')->group(function(){
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('user', WebuserController::class);
    Route::resource('role', RolesController::class);
    Route::resource('manage_role', ManageroleController::class);
  });
});


Route::prefix('user')->name('user.')->group(function(){
  Route::middleware('auth')->group(function(){
   Route::get('dashboard', [LoginController::class,'dashboard'])->name('dashboard');
   
   Route::get('message/index', [MessageController::class, 'index'])->name('message');
   Route::get('message/send', [MessageController::class, 'send'])->name('messagesend');
  });
});

// Route::get('/', function(){
// return view('welcome');
// });

Route::get('fireevent', [EventController::class,'fireevent']);
Route::get('listenevent', [EventController::class,'listenevent']);




Route::resource('categories', CategoryController::class);






// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

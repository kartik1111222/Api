<?php

use App\Http\Controllers\API\Admin\UserController;
use App\Http\Controllers\API\Admin\LoginController;
use App\Http\Controllers\API\CategoryController as APICategoryController;
use App\Http\Controllers\API\RegistrationController;
use App\Http\Controllers\API\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//User
Route::post('registration', [RegistrationController::class, 'user_registration'])->name('user_registration');
Route::post('login', [RegistrationController::class, 'user_login'])->name('user_login');

//Admin
Route::post('admin_login', [LoginController::class,'admin_login'])->name('admin_login');

Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware('auth:admin_api')->group(function () {

        Route::resource('user', UserController::class);       

    });
});



Route::resource('categories', APICategoryController::class);

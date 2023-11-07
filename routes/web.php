<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\RoleController;

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
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'loginCheck'])->name('loginCheck');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::as('backend.')->group(function () {
        /**
         * Application Routes
         */
        Route::resource('application', ApplicationController::class)->only(['index', 'edit', 'update']);

        /**
         * User Routes
         */
        Route::get('user/getUsers', [UserController::class, 'getUsers'])->name('user.getUsers');
        Route::post('user/updateStatus', [UserController::class, 'updateStatus'])->name('user.updateStatus');
        Route::delete('user/delete', [UserController::class, 'delete'])->name('user.delete');
        Route::resource('user', UserController::class)->except(['destroy']);

        /**
         * Role Routes
         */
        Route::get('role/getRoles', [RoleController::class, 'getRoles'])->name('role.getRoles');
        Route::delete('role/delete', [RoleController::class, 'delete'])->name('role.delete');
        Route::resource('role', RoleController::class)->except(['show', 'destroy']);
    });

});

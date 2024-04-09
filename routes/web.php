<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\VenueController;
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

Route::get('/', function () {
    return view('welcome');
})->name("welcome");

Auth::routes();

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resources([
        'roles' => RoleController::class,
        'users' => UserController::class,
        'permissions' => PermissionController::class,
        'categories' => CategoriesController::class
    ]);

    Route::controller(VenueController::class)->group(function () {
        Route::get('venues', 'index')->name('venues.index');
        Route::get('venues/create', 'create')->name('venues.create');
        Route::post('venues', 'store')->name('venues.store');
        Route::get('venus/edit/{slug}', 'edit')->name('venues.edit');
        Route::get('venus/show/{slug}', 'show')->name('venues.show');
        Route::delete('venues/{slug}', 'destroy')->name('venues.destroy');
    });
});


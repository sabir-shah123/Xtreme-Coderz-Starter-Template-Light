<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::post('/profile-save', [DashboardController::class, 'general'])->name('profile.save');
    Route::post('/password-save', [DashboardController::class, 'password'])->name('password.save');

    //users routes
    Route::prefix('users')->name('user.')->group(function () {
        Route::get('/list', [UserController::class, 'list'])->name('list');
        Route::get('/add', [UserController::class, 'add'])->name('add');
        Route::get('/edit/{id?}', [UserController::class, 'edit'])->name('edit');
        Route::post('/save/{id?}', [UserController::class, 'save'])->name('save');
        Route::get('/delete/{id?}', [UserController::class, 'delete'])->name('delete');
        Route::get('/is-active/{id?}', [UserController::class, 'isActive'])->name('is-active');
    });

    Route::prefix('company/settings')->name('company.')->group(function(){
        Route::get('/', [SettingController::class, 'settings'])->name('setting');
        Route::post('/save', [SettingController::class, 'save'])->name('setting.save');
    });
});

require __DIR__ . '/auth.php';


//public view of invoice and invoice-items
// Route::get('/public/invoice/view/{id?}', [InvoiceController::class, 'publicView'])->name('public.invoice.view');
<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\DynamicFormController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RedirectAuthenticatedUsersController;
use App\Http\Controllers\User\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
// });

require __DIR__.'/auth.php';


Route::middleware('auth')->group(function () {
    Route::get('/home', [RedirectAuthenticatedUsersController::class, 'home']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('logout', [AdminController::class,'logout'])->name('user.logout');

    Route::group(['middleware' => 'checkRole:admin'], function() {
        // admin dashboard route€
        Route::get('/dashboard', [AdminController::class, 'adminDashboard'])->name('adminDashboard');
        Route::resource('form-builder', DynamicFormController::class);

    });

    // for customer
    Route::group(['middleware' => 'checkRole:user'], function() {
        // user dashboard route
        Route::get('/dashboard', [UserController::class, 'userDashboard'])->name('dashboard');
        Route::get('/get-form-builder', [UserController::class, 'getFormBuilder'])->name('get.form.builder');
        Route::get('/save-form', [UserController::class, 'userSaveForm'])->name('user.saveForm');
        
        Route::get('logout', [UserController::class,'logout'])->name('logout');

    });

});
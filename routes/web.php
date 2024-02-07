<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HajjController;
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

// Route::get('/', 'HajjController@index')->name('hajj.index');
Route::get('/', [HajjController::class, 'index'])->name('hajj.index');

Route::controller(AuthController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('admin', 'login')->name('login');
        Route::get('register', 'register')->name('register');
        Route::post('loginAdmin', 'postLogin')->name('post.login');
        Route::post('register', 'postRegister')->name('post.register');
    });

    Route::middleware(['auth:web'])->group(function () {
        Route::get('home', 'home')->name('home');
        Route::get('logout', 'logout')->name('logout');
    });
});

Route::middleware(['auth:web'])->group(function () {
    Route::prefix('hajj')->name('hajj.')->group(function () {
        Route::get('page', [HajjController::class, 'page'])->name('page');
        Route::get('edit/{id}', [HajjController::class, 'edit'])->name('edit');
        Route::get('create', [HajjController::class, 'create'])->name('create');
        Route::post('store', [HajjController::class, 'store'])->name('store');
        Route::put('update/{id}', [HajjController::class, 'update'])->name('update');
        Route::delete('destroy/{id}', [HajjController::class, 'destroy'])->name('destroy');
    });
});

Route::post('/search', [HajjController::class, 'search'])->name('search');


// Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
// Route::post('/admin/login', [AdminLoginController::class, 'login']);
// Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';

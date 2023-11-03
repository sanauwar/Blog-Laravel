<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

/**
 * Custom_Auth Routes...
 */

/**
 * Dashboard
 */
Route::get('/home', [CustomAuthController::class, 'home'])->name('home');


/**
 * Login
 */
Route::get('/user/login', [CustomAuthController::class, 'view'])->name('login.view');
Route::post('/user/login', [CustomAuthController::class, 'login'])->name('login');

/**
 *Registration 
 */

Route::get('/', [CustomAuthController::class, 'register'])->name('register.view');
Route::post('user/register', [CustomAuthController::class, 'store'])->name('store');
Route::get('user/register', [CustomAuthController::class, 'register'])->name('register.view');

/**
 * User LOgout
 */
Route::get('user/logout', [CustomAuthController::class, 'logout'])->name('user.logout');

/**
 * Blog Routes
 */
Route::get('blog', [BlogController::class, 'view'])->name('blog.view');
Route::post('blog/store', [BlogController::class, 'store'])->name('blog.store');
Route::get('users/allBlog', [BlogController::class, 'allblog'])->name('allblog');

/**
 * Like Comment Routes 
 */
Route::get('blog/like', [BlogController::class, 'like'])->name('blog.like');

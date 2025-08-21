<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

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
// Home routes
// These routes are accessible to all users, authenticated or not
// The 'auth' middleware is used to protect routes that require authentication
// The 'admin' middleware can be used to restrict access to admin users only, if needed

// Home route for unauthenticated users
Route::get('/',[HomeController::class, 'homepage'])->name('homepage'); // Home route for unauthenticated users
// Home route for authenticated users
// This route will redirect to the admin index if the user is an admin, or to the homepage if the user is a regular user
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home'); // Home route for authenticated users
Route::get('/post_detail/{id}', [HomeController::class, 'post_detail']);
Route::get('/create_post', [HomeController::class, 'create_post'])->middleware('auth'); // Route to show the create post form for authenticated users
Route::post('/user_post', [HomeController::class, 'user_post'])->middleware('auth'); // Route to handle user post creation
Route::get('/my_post', [HomeController::class, 'my_post'])->middleware('auth'); // Route to show user's posts
Route::get('/delete_post/{id}', [HomeController::class, 'delete_post'])->middleware('auth'); // Route to handle post deletion
Route::get('/update_post/{id}', [HomeController::class, 'update_post'])->middleware('auth'); // Route to show the update post form
Route::post('/update_post_data/{id}', [HomeController::class, 'update_post_data'])->middleware('auth'); // Route to handle post update
// profile user
Route::get('/profile', [HomeController::class, 'profile'])->middleware('auth')->name('profile'); // Route to show user profile
Route::post('/profile/update', [HomeController::class, 'update_profile'])->middleware('auth')->name('user.profile.update'); // Route to handle profile update


/*Route::get('/', function () {
    return view('welcome');
}); */


// Admin routes
// These routes are accessible only to authenticated users with the 'admin' usertype
// The 'auth' middleware is used to protect these routes

// Admin home route
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth')->name('admin.index'); // Admin home route
// Admin post management routes
// route::get('/home', [AdminController::class, 'index'])->name('home');
Route::get('/post_page',[AdminController::class, 'post_page'])->name('post_page');
Route::post('/add_post',[AdminController::class, 'add_post'])->name('add_post');
Route::get('/show_post',[AdminController::class, 'show_post'])->name('show_post');
Route::get('/delete_post/{id}',[AdminController::class, 'delete_post'])->name('delete_post');
Route::get('/edit_post/{id}',[AdminController::class, 'edit_post'])->name('edit_post');
Route::post('/update_post/{id}',[AdminController::class, 'update_post'])->name('update_post');
Route::get('/accept_post/{id}', [AdminController::class, 'accept_post'])->name('accept_post'); // Route to accept a post
Route::get('/reject_post/{id}', [AdminController::class, 'reject_post'])->name('reject_post'); // Route to reject a post
// Profile routes






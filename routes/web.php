<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomePageController;
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

//Route::get('/home/{id}', [HomePageController::class, 'index']);
//
//Route::get('/hello', function () {
//    return 'Hello world!';
//});
//
//Route::get('/users/{id?}', function ($id = 'No Id provided') {
//    return 'user id is : ' . $id;
//});
//
//Route::get('/view', function () {
//    return view('child');
//});
//
Route::get('/', function () {
    return view('welcome', [
        'name' => 'Mustafa'
    ]);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index']);
    Route::get('/editProfile', [\App\Http\Controllers\EditController::class, 'index']);
    Route::put('/editProfile', [\App\Http\Controllers\EditController::class, 'store'])->name('profile.edit');
    Route::post('/posts', [\App\Http\Controllers\PostController::class, 'store'])->name('posts.create');
    Route::post('/posts/{post_id}/comments', [\App\Http\Controllers\CommentController::class, 'store'])->name('comments.create');
    Route::post('/posts/{post_id}/{liked}/likes', [\App\Http\Controllers\LikesController::class, 'store'])->name('likes.create');
    Route::get('/profile/{user_id}', [\App\Http\Controllers\ProfileController::class, 'index'])->name('visit.profile');
});

Route::get('test', function () {
   return view('auth.edit');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

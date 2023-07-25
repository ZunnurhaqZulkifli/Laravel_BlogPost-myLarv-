<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostTagController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\UserCommentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

/***
 * 
 * BACKUP ROUTES
 * 
 Route::resource('/posts' , PostController::class);
 Route::resource('posts.comments', PostCommentController::class)->only(['index','store']);
 Route::get('/posts/tag/{tag}', [PostTagController::class, 'index'])->name('posts.tags.index');
 Route::resource('users.comments', UserCommentController::class)->only(['store']);
 Route::resource('users' , UserController::class)->only(['show' , 'edit' , 'update']);
 Route::get('/users.posts', [UserController::class, 'posts'])->name('user.posts');
 * 
 */


//Home Controllers

Route::get('/', [HomeController::class, 'home'])
    ->name ('home');

Route::get('/assets',[HomeController::class, 'assets']) 
    ->name('assets');
    // ->middleware('auth');

Route::get('/registered', [HomeController::class, 'registered'])->name('registered');

Route::get('/contact', [HomeController::class, 'contact'])
    ->name ('contact');

Route::get('/zunnur', [HomeController::class, 'zunnur'])
    ->name('zunnur');
    
Route::get('/secret', [HomeController::class, 'secret'])
    ->name('secret')
    ->middleware('can:home.secret');

//Posts Controller
Route::resource('/posts' , 'PostController');
Route::resource('posts.comments', 'PostCommentController')->only(['index','store']);
Route::get('/posts/tag/{tag}', 'PostTagController@index')->name('posts.tags.index');

Route::get('mailable', function() {
    $comment = App\Comment::find(1);
    return new App\Mail\CommentPostedMarkdown($comment);
});

// Route::get('/posts/tag/{tag}', [PostTagController::class, 'sort'])->name('posts.tags.sort');

//Users Controller
Route::resource('users.comments', 'UserCommentController')->only(['store']);
Route::resource('users' , 'UserController')->only(['show' , 'edit' , 'update']);
Route::get('/users.posts', 'UserController@posts')->name('user.posts');
//Auth Controller
Auth::routes();
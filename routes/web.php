<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/user', function () {
    if (Auth::check()) {
        return view('user');
    }
    $userCount = count(User::get());
    $postCount = count(Post::get());
    $likeCount = count(Like::get());
    return redirect(route('home'));
})->name('user');

Route::get('/', function () {
    if (Auth::check()) {
        return view('home');
    }
    $userCount = count(User::get());
    $postCount = count(Post::get());
    $likeCount = count(Like::get());

    return view('welcome', ['userCount' => $userCount, 'postCount' => $postCount, 'likeCount' => $likeCount]);
})->name('home');

Route::post('/home', '\App\Http\Controllers\HomeController@createPost');

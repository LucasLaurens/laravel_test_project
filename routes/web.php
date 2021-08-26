<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth', 'is.admin'])->group(function() {
    Route::get('/foo', '\App\Http\Controllers\TestController@foo');
    Route::get('/bar', '\App\Http\Controllers\TestController@bar');
    Route::get('/home', '\App\Http\Controllers\TestController@index')->withoutMiddleware(['auth', 'is.admin'])->name('home');
    Route::delete('/home/{id}', '\App\Http\Controllers\TestController@delete')->withoutMiddleware(['auth', 'is.admin'])->name('post.delete');
    Route::get('/posts', '\App\Http\Controllers\TestController@posts')->withoutMiddleware(['auth', 'is.admin'])->name('posts');
    // Route::get('/create', '\App\Http\Controllers\TestController@create')->withoutMiddleware(['auth', 'is.admin']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

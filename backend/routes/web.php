<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// トップ画面を表示
Route::get('/', 'App\Http\Controllers\TweetController@index')->name('index');

// 投稿
Route::post('post', [TweetController::class, 'store'])->name('store');

// 投稿削除
Route::post('post/{tweet_id}', [TweetController::class, 'destroy'])->name('destroy');

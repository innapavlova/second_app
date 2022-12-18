<?php

use App\Http\Controllers\UserPageController;
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
    return redirect()->away('http://127.0.0.1:8000/');
});
//Route::get('/', ['as' => 'checkLogin', 'uses' => 'App\Http\Controllers\UserPageController@checkLogin']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'App\Http\Controllers\UserPageController@logout']);

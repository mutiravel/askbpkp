<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AskController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\Auth;
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

Route::get('/', 'AskController@index1');
Route::view('/welcome', 'welcome');
Route::resource('ask', 'AskController');
Route::resource('admin', 'AdminController');
//Auth::routes();
Route::post('registerUser', 'AdminController@registerUser');

Route::post('registerUser', 'AskController@registerUser');
Route::post('loginUser', 'AskController@login');

Route::group(['middleware' => 'customAuth'], function () {
    Route::view('register', 'registration');
    Route::view('login', 'login');
    Route::get('logout', 'AskController@login');
});

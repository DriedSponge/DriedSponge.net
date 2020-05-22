<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SteamLoginController;
use kanalumaddela\LaravelSteamLogin\Facades\SteamLogin;
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

;


Route::get('/', 'PagesController@index');
Route::get('/home', 'PagesController@index');
Route::get('/web-projects', 'PagesController@webprojects');

Route::get('/feedback', 'FeedBackController@create');
Route::post('/feedback', 'FeedBackController@store');

//Auth
Route::get('/login', 'Auth\SteamLoginController@login')->name('login');
Route::get('auth/steam', 'Auth\SteamLoginController@authenticate')->name('auth.steam');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');








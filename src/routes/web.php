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

Route::domain(config('extra.image_domain'))->group(function () {
    Route::get('/file/{name}', 'FileUploads@loadFile')->name('upload.load-file');
    Route::get('/{uuid}', 'FileUploads@loadView')->name('upload.load-view');
});

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/logout', 'Auth\LoginController@logout');

Route::prefix('app')->group(function () {

    Route::prefix('login')->group(function () {
        Route::get('/steam',function (){
            return Socialite::driver('steam')->redirect(); // Steam Login
        })->name('login.steam');
        Route::get('/discord',function (){
            return Socialite::driver('discord')->scopes(['connections'])->redirect(); // Discord Login
        })->name('login.discord');
        Route::get('/github',function (){
            return Socialite::driver('github')->redirect(); // github Login
        })->name('login.github');
        //Route::get('/login/google', function () {
        //    return Socialite::driver('google')->redirect(); //Google Login
        //})->name('login.google');
    });

    Route::prefix('auth')->group(function () {
        Route::get('/steam', 'Auth\SteamLoginController@auth')->name('auth.steam');
        Route::get('/discord', 'Auth\DiscordLoginController@auth')->name('auth.discord');
        Route::get('/github', 'Auth\GithubLoginController@auth')->name('auth.github');
        //Route::get('/auth/google', 'Auth\SteamLoginController@auth')->name('auth.google');
    });

    Route::get('/user', 'Auth\User@me');
    Route::get('/user/can/{pname}', 'Auth\user@can');
    Route::post('/contact/send', 'ContactController@send')->name('contact.send');


    Route::get('/manage/contact-form/', 'Manage\Contact@index');
    Route::get('/manage/contact-form/{id}', 'Manage\Contact@read');
    Route::delete('/manage/contact-form/{id}', 'Manage\Contact@delete');

    Route::get('/manage/alerts', 'Manage\AlertsController@index');
    Route::post('/manage/alerts', 'Manage\AlertsController@store');
    Route::delete('/manage/alerts/{id}', 'Manage\AlertsController@destroy');
    Route::get('/manage/alerts/{id}', 'Manage\AlertsController@show');
    Route::put('/manage/alerts/{id}', 'Manage\AlertsController@update');
});


Route::get('/{any}', function(){
    return view('spa');
})->name('spa')->where('any', '.*');

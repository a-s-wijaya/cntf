<?php

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/profile/{id}', 'HomeController@profile')->name('profile');
Route::post('/profile/edit', 'HomeController@editProfile')->name('profile.edit');

Route::get('/sdgs/{id}', 'SDGSController@create')->name('sdgs');
Route::get('/sdgs/status/{id}', 'SDGSController@status')->name('sdgs.status');
Route::post('/sdgs/resubmit/{id}', 'SDGSController@resubmit')->name('sdgs.resubmit');

Route::post('/emission/create', 'EmissionController@create')->name('2.store');
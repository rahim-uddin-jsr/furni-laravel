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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware('auth')->group(function () {
    // Routes that require authentication
    Route::get('/dashboard',function () {
        return view('layouts.dashboard');
    })->name('dashboard');
    // Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    // Add more authenticated routes here
});

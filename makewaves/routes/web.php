<?php

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

Route::get('/data-page', function () {
    return view('data');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::prefix('/data')->group(function() {
    Route::get('/', 'Controller@getData');
});
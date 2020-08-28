<?php


use Illuminate\Support\Facades\Route;
Route::get('/', 'PageController@index');
Route::get('/about-us', 'PageController@about');
Route::get('/dashboard', 'PageController@dashboard');


Auth::routes();


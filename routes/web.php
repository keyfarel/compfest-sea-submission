<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/menu', 'pages.menu')->name('menu');
Route::view('/subscription', 'pages.subscription')->name('subscription');
Route::view('/testimoni', 'pages.testimoni')->name('testimoni');

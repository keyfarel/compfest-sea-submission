<?php

use  App\Livewire\Frontend\Pages\Welcome;
use Illuminate\Support\Facades\Route;
use App\Livewire\WelcomeDashboard;

Route::get('/', Welcome::class);
Route::get('/welcome', WelcomeDashboard::class);

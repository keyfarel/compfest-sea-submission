<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\WelcomeDashboard;

Route::get('/welcome', WelcomeDashboard::class);

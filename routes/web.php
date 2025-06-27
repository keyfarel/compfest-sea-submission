<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Pages\Contact\Contact;
use App\Livewire\Pages\Home\Home;
use App\Livewire\Pages\Menu\Menu;
use App\Livewire\Pages\Subscription\Subscription;
use App\Livewire\Pages\Testimoni\Testimoni;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/menu', Menu::class)->name('menu');
Route::get('/testimoni', Testimoni::class)->name('testimoni');
Route::get('/subscription', Subscription::class)->name('subscription');
Route::get('/contact', Contact::class)->name('contact');

Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

Route::view('/test', 'test');
Route::view('/test-admin', 'test-admin');


<?php

use App\Livewire\Auth\Login;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Auth\Register;
use App\Livewire\Pages\Contact\Contact;
use App\Livewire\Pages\Home\Home;
use App\Livewire\Pages\Menu\Menu;
use App\Livewire\Pages\Subscription\Subscription;
use App\Livewire\Pages\Testimoni\Testimoni;
use App\Livewire\User\Dashboard as UserDashboard;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/menu', Menu::class)->name('menu');
Route::get('/testimoni', Testimoni::class)->name('testimoni');
Route::get('/subscription', Subscription::class)->name('subscription');
Route::get('/contact', Contact::class)->name('contact');

Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

Route::middleware(['auth', 'role:1'])->get('/admin-dashboard', AdminDashboard::class)->name('admin-dashboard');
Route::middleware(['auth', 'role:2'])->get('/user-dashboard', UserDashboard::class)->name('user-dashboard');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');

Route::get('/test-user-dashboard', function () {
    dd(Auth::user());
});



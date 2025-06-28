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
use App\Livewire\Admin\ManageUsers\Index as ManageUsers;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/menu', Menu::class)->name('menu');
Route::get('/testimoni', Testimoni::class)->name('testimoni');
Route::get('/subscription', Subscription::class)->name('subscription');
Route::get('/contact', Contact::class)->name('contact');

Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

// admin role
Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/admin-dashboard', AdminDashboard::class)->name('admin-dashboard');
    Route::get('/admin-manage-users', ManageUsers::class)->name('manage-users');
    Route::get('/admin-manage-orders', function () {
        return view('livewire.admin.manage-orders');
    })->name('manage-orders');
    Route::get('/admin-reports', function () {
        return view('livewire.admin.reports');
    })->name('reports');
});

// user role
Route::middleware(['auth', 'role:2'])->group(function () {
    Route::get('/user-dashboard', UserDashboard::class)->name('user-dashboard');
    Route::get('/user-subscriptions', function () {
        return view('livewire.user.subscriptions');
    })->name('user-subscriptions');
    Route::get('/user-orders', function () {
        return view('livewire.user.orders');
    })->name('user-orders');
});

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');

Route::get('/test-user-dashboard', function () {
    dd(Auth::user());
});



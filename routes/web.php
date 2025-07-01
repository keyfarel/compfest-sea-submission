<?php

use Illuminate\Support\Facades\Auth;
use App\Livewire\Pages\Testimoni\CreateTestimoni;
use App\Livewire\Pages\Home\Index as HomePage;
use App\Livewire\Pages\Contact\Index as ContactPage;
use App\Livewire\Pages\Menu\Index as MenuPage;
use App\Livewire\Pages\Subscription\Index as SubscriptionPage;
use App\Livewire\Pages\Testimoni\Index as TestimoniPage;
use App\Livewire\Auth\Login\Index as LoginPage;
use App\Livewire\Auth\Register\Index as RegisterPage;
use App\Livewire\User\Dashboard as UserDashboard;
use App\Livewire\User\SubscribeList\Index as UserSubscribe;
use App\Livewire\User\HistorySubscribe\Index as HistorySubscribe;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\Admin\ManageUsers\Index as ManageUsers;
use App\Livewire\Admin\ManageSubscribe\Index as ManageSubscribe;
use Illuminate\Support\Facades\Route;

// Halaman publik
Route::get('/', HomePage::class)->name('home');
Route::get('/menu', MenuPage::class)->name('menu');
Route::get('/testimoni', TestimoniPage::class)->name('testimoni');
Route::get('/subscription', SubscriptionPage::class)->name('subscription');
Route::get('/contact', ContactPage::class)->name('contact');
Route::get('/login', LoginPage::class)->name('login');
Route::get('/register', RegisterPage::class)->name('register');

Route::get('/tulis-testimoni', CreateTestimoni::class)
    ->middleware('auth')
    ->name('testimoni.create');

// Grup route untuk admin (role: 1)
Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/admin-dashboard', AdminDashboard::class)->name('admin-dashboard');
    Route::get('/admin-manage-users', ManageUsers::class)->name('manage-users');
    Route::get('/admin-manage-orders', ManageSubscribe::class)->name('manage-orders');
});

// Grup route untuk user (role: 2)
Route::middleware(['auth', 'role:2'])->group(function () {
    Route::get('/user-dashboard', UserDashboard::class)->name('user-dashboard');
    Route::get('/user-subscriptions', UserSubscribe::class)->name('user-subscriptions');
    Route::get('/user-orders', HistorySubscribe::class)->name('user-orders');
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



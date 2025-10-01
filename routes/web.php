<?php

use App\Http\Controllers\HomeController;
use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\User\Dashboard;
use App\Livewire\User\SellerDashboard;
use App\Livewire\User\UpdateInformation;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth');
//->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed']); 
//->name('verification.verify');

Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
     Route::get('switch/account', [HomeController::class, 'switchAccount'])->name('switch.account');

     Route::get('user/dashboard', Dashboard::class)->name('user.dashboard');
     Route::get('update/information', UpdateInformation::class);
     Route::get('seller/dashboard', SellerDashboard::class);

      Route::get('admin/dashboard', AdminDashboard::class)->name('admin.dashboard');
});




Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';

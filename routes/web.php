<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\login;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Livewire\Admin\Cockpit;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Route Page Accueil
Route::view('/', 'welcome');
//Route inscription
/*Route::get('/register', Register::class)->name('register');
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
 //Route profile
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');*/
    //Route::view('/login', 'login')->name(('login'));
    //Route::post('/login', [AuthenticatedSessionController::class, 'store'])
   /// ->middleware('guest')
   // ->name('login');
    Route::middleware(['auth', 'verified'])->group(function () {
   //Route::get('/admin/dashboard', Cockpit::class)
    //->name('admin.cockpit');
    Route::view('client/dashboard', 'livewire.client.dashboard')->name('client.dashboard');
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('admin/dashboard', 'livewire.admin.dashboard')->name('admin.dashboard');
    Route::view('admin/dashboard', 'livewire.admin.cockpit')->name('admin.cockpit');
    Route::view('profile', 'profile')->name(('profile'));
    Route::view('/client/deposits', 'livewire.client.deposits')->name('client.deposits');
    Route::view('client/withdrawals', 'livewire.client.withdrawals')->name('client.withdrawals');
    Route::view('/client/kyc', 'livewire.client.kyc')->name('client.kyc');
    Route::view('/client/notifications', 'client.notifications')->name('client.notifications');
});


require __DIR__.'/auth.php';
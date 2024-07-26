<?php


use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DomainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [SessionsController::class, 'index'])->name('home');
Route::post('/check', [DomainController::class, 'check'])->name('check.domain');
Route::post('/config', [DomainController::class, 'config'])->name('config');
Route::get('/configuration/view/', [DomainController::class, 'showConfiguration'])->name('configuration.view');

Route::group(['middleware' => 'auth'], function () {
	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');
	Route::post('/checkout', [DomainController::class, 'checkout'])->name('checkout');
	Route::get('/order/{id}', [DomainController::class, 'order'])->name('order');
	Route::get('/order/download/{id}', [DomainController::class, 'downloadInvoice'])->name('invoice.download');
    Route::get('/logout', [SessionsController::class, 'destroy']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});

Route::group(['middleware' => 'guest'], function () {	
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');
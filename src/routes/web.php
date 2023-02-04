<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get("phpinfo", function () {
    phpinfo();
});

Auth::routes();

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::resources([
    'account-types' => \App\Http\Controllers\AccountTypeController::class,
    'accounts' => \App\Http\Controllers\AccountController::class,
]);

Route::resource('currencies', \App\Http\Controllers\CurrencyController::class)->only(['index']);

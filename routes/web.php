<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BestellingController;
use App\Http\Controllers\BestellingRegelController;
use App\Http\Controllers\EenheidController;
use App\Http\Controllers\KlantController;
use App\Http\Controllers\LeverancierController;
use App\Http\Controllers\VoorraadRegelController;
use App\Models\Role;
use App\Models\User;
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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('artikel', ArtikelController::class);
Route::resource('bestelling', BestellingController::class);
Route::resource('bestellingregel', BestellingRegelController::class);
Route::resource('eenheid', EenheidController::class);
Route::resource('leverancier', LeverancierController::class);
Route::resource('voorraadregel', VoorraadRegelController::class);
Route::resource('klant', KlantController::class);

// zoek routes
Route::get('/zoek/bestelling/', [BestellingController::class, 'search'])->name('bestelling.zoek');

require __DIR__.'/auth.php';



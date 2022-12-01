<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->to(route('dashboard'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(['prefix' => 'clients', 'as' => 'client.', 'middleware' => 'auth'], function () {
    Route::get('/index', ClientsController::class . '@index')->name('index');
    Route::get('/create', ClientsController::class . '@create')->name('create');
    Route::get('/show/{client}', ClientsController::class . '@show')->name('show');
    Route::get('/edit/{client}', ClientsController::class . '@edit')->name('edit');
    Route::post('/store', ClientsController::class . '@store')->name('store');
    Route::put('/update/{client}', ClientsController::class . '@update')->name('update');
});
require __DIR__ . '/auth.php';

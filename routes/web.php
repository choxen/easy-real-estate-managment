<?php

use App\Http\Controllers\AreasController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\LandsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertiesController;
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

Route::group(['prefix' => 'properties', 'as' => 'property.', 'middleware' => 'auth'], function () {
    Route::get('/show/{property}', PropertiesController::class . '@show')->name('show');
    Route::get('/create/{client}', PropertiesController::class . '@create')->name('create');
    Route::get('/edit/{property}', PropertiesController::class . '@edit')->name('edit');
    Route::post('/store', PropertiesController::class . '@store')->name('store');
    Route::put('/update/{property}', PropertiesController::class . '@update')->name('update');
});

Route::group(['prefix' => 'lands', 'as' => 'land.', 'middleware' => 'auth'], function () {
    Route::get('/show/{land}', LandsController::class . '@show')->name('show');
    Route::get('/create/{property}', LandsController::class . '@create')->name('create');
    Route::get('/edit/{land}', LandsController::class . '@edit')->name('edit');
    Route::post('/store', LandsController::class . '@store')->name('store');
    Route::put('/update/{land}', LandsController::class . '@update')->name('update');
});

Route::group(['prefix' => 'areas', 'as' => 'area.', 'middleware' => 'auth'], function () {
    Route::get('/show/{area}', AreasController::class . '@show')->name('show');
    Route::get('/create/{land}', AreasController::class . '@create')->name('create');
    Route::get('/edit/{area}', AreasController::class . '@edit')->name('edit');
    Route::post('/store', AreasController::class . '@store')->name('store');
    Route::put('/update/{area}', AreasController::class . '@update')->name('update');
});

require __DIR__ . '/auth.php';

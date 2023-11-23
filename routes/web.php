<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// routes/web.php

use App\Http\Controllers\CountyController;

Route::get('/counties', [CountyController::class, 'index'])->name('counties.index');
Route::get('/counties/create', [CountyController::class, 'create'])->name('counties.create');
Route::post('/counties', [CountyController::class, 'store'])->name('counties.store');
Route::get('/counties/{county}/edit', [CountyController::class, 'edit'])->name('counties.edit');
Route::put('/counties/{county}', [CountyController::class, 'update'])->name('counties.update');
Route::delete('/counties/{county}', [CountyController::class, 'destroy'])->name('counties.destroy');
Route::get('/counties/filter', [CountyController::class, 'filter'])->name('counties.filter');

use App\Http\Controllers\CityController;

Route::get('/cities/filter', [CityController::class, 'filterByCounty'])->name('cities.filter');
Route::get('/cities', [CityController::class, 'index'])->name('cities.index');
Route::get('/cities/create', [CityController::class, 'create'])->name('cities.create');
Route::post('/cities', [CityController::class, 'store'])->name('cities.store');
Route::get('/cities/{city}/edit', [CityController::class, 'edit'])->name('cities.edit');
Route::put('/cities/{city}', [CityController::class, 'update'])->name('cities.update');
Route::delete('/counties/{city}', [CityController::class, 'destroy'])->name('cities.destroy');


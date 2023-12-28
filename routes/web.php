<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalTypeController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\VaccinationController;
use App\Http\Controllers\SpecialistController;
use App\Http\Controllers\ClientController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::group(["name"=>"admin", "prefix"=>"admin"], function(){
        // animal category routes resource
        Route::resource('animal-types', AnimalTypeController::class);
        // cities routes resource
        Route::resource('cities', CityController::class);
        // regions routes resource
        Route::resource('regions', RegionController::class);
        Route::get('cities/{id}/regions', [RegionController::class, 'index'])->name('regions.index');
        Route::get('cities/{id}/regions/details', [RegionController::class, 'show'])->name('regions.details');
        Route::get('cities/{id}/regions/create', [RegionController::class, 'create'])->name('regions.create');
        // vaccinations routes resource
        Route::resource('vaccinations', VaccinationController::class);
        Route::resource('specialists', SpecialistController::class);
        // clients routes resource
        Route::resource('clients', ClientController::class);
    });

});



require __DIR__.'/auth.php';

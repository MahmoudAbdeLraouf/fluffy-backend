<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalTypeController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\VaccinationController;
use App\Http\Controllers\SpecialistController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SpecialistOrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\OrderInvitationController;

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
        // client city
        Route::get('clients/{id}/city', [ClientController::class, 'city'])->name('clients.city');
        // orders routes resource
        Route::resource('orders', OrderController::class);
        Route::get('orders/{id}/invite', [OrderInvitationController::class, 'invite'])->name('orders.invite');
        Route::post('orders/invite/send', [OrderInvitationController::class, 'sendInvitation'])->name('orders.invite.send');
        // orders items routes resource
        Route::resource('items', OrderItemController::class);
        Route::get('orders/{id}/items', [OrderItemController::class, 'index'])->name('orders.items.list');
        Route::get('orders/{id}/items/create', [OrderItemController::class, 'create'])->name('orders.items.create');

    });

});


Route::group(["name"=>"specialists", "prefix"=>"specialists"], function(){
    Route::get('orders/new', [SpecialistOrderController::class, 'listNewOrders'])->name('specialists.orders.new');
    Route::get('orders/current', [SpecialistOrderController::class, 'listCurrentOrders'])->name('specialists.orders.current');
    Route::get('orders/completed', [SpecialistOrderController::class, 'listCompletedOrders'])->name('specialists.orders.completed');
    Route::get('orders/details/{id}', [SpecialistOrderController::class, 'details'])->name('specialists.orders.details');
    Route::get('orders/status/change/{id}/{status}', [SpecialistOrderController::class, 'changeStatus'])->name('specialists.orders.status.change');

});

require __DIR__.'/auth.php';

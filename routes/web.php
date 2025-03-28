<?php

use App\Http\Controllers\MasterController;
use App\Models\Master;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;

Route::domain('{subdomain}.' . config('app.central_domain'))->group(function () {
    Route::middleware(['check.tenant'])->group(function () {
        Route::get('/', function () {
            $tenant = session()->get('tenant');
            return view('home', compact('tenant'));
        });
    });
});

Route::domain(config('app.central_domain'))->group(function () {
    Route::get('/', function () {
        return view('home');
    }); 
    // Masters routes
    Route::get('/masters', [MasterController::class, 'index'])->name('masters.index');
    Route::get('/masters/{code}', [MasterController::class, 'show'])->name('masters.show');
    Route::get('/masters/{master}/card', function (Master $master) {
        return view('masters.card', compact('master'));
    })->name('masters.card');
});
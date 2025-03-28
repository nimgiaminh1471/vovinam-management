<?php

use App\Http\Controllers\MasterController;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;

Route::domain('{subdomain}.' . env('CENTRAL_DOMAIN'))->group(function () {
    Route::middleware(['check.tenant'])->group(function () {
        Route::get('/', function () {
            $tenant = session()->get('tenant');
            return view('welcome', compact('tenant'));
        });


    });
});

Route::domain(env('CENTRAL_DOMAIN'))->group(function () {
    Route::get('/', function () {
        return view('welcome');
    }); 
    // Masters routes
    Route::get('/masters', [MasterController::class, 'index'])->name('masters.index');
    Route::get('/masters/{id}', [MasterController::class, 'show'])->name('masters.show');
});
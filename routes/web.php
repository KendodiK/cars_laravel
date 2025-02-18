<?php

use App\Http\Controllers\FuelController;
use App\Http\Controllers\MakerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout');
});

Route::get('/makers',[MakerController::class, 'index'])->name('makers.index');
Route::get('/makers/create', [MakerController::class, 'create'])->name('makers.create');
Route::post('/makers', [MakerController::class, 'store'])->name('makers.store');
Route::delete('/makers/{maker}', [MakerController::class, 'destroy'])->name('makers.destroy');
Route::get('/makers/{maker}/edit', [MakerController::class, 'edit'])->name('makers.edit');
Route::patch('/makers/{maker}', [MakerController::class, 'update'])->name('makers.update');
Route::get('/makers/{body}', [MakerController::class, 'show'])->name('makers.show');

Route::get('/fuels', [FuelController::class, 'index'])->name('fuels.index');
Route::get('fuels/create', [FuelController::class, 'create'])->name('fuels.create');
Route::post('/fuels', [FuelController::class, 'store'])->name('fuels.store');
Route::delete('fuels/{fuel}', [FuelController::class, 'destroy'])->name('fuels.destroy');
<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\Controller;


Route::get('/', function () {
    return view(view: 'home');
});

Route::get('eventos', [EventoController::class, 'index'])->name('eventos');
Route::get('eventos/{evento}', [EventoController::class, 'evento'])->name('evento');
Route::get('create', [EventoController::class, 'crear'])->name('crear');
Route::post("eventos/agregar", [EventoController::class, 'agregar'])->name('agregar');
Route::get("update/{evento}", [EventoController::class, 'editar'])->name('editar');
Route::put('eventos/actualizar',[EventoController::class,'actualizar'])->name('actualizar');
Route::delete("delete/{evento}", [EventoController::class, 'delete'])->name('delete');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

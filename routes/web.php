<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; //necesario para usar Auth::check

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //usuarios regustrados
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Rutas para roles
    Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('roles/data', [RoleController::class, 'getData'])->name('roles.data');
    Route::post('roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('roles/{id}/edit', [RoleController::class, 'edit']);
    Route::put('roles/{id}', [RoleController::class, 'update']);
    Route::delete('roles/{id}', [RoleController::class, 'destroy']);
});

require __DIR__ . '/auth.php';

// Captura cualquier ruta y la manda a login si no inicio sesion
// lanza el error 404 si el usuario esta logueado y la ruta no existe
Route::fallback(function () {
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    abort(404);
});

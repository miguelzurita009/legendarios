<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; //necesario para usar Auth::check
use App\Livewire\Users\Index;
use App\Livewire\Users\Show;
use App\Livewire\TipoAnalisis\Index as TipoAnalisisIndex;
use App\Livewire\TipoAnalisis\Show as TipoAnalisisShow;
use App\Livewire\Eventos\Index as EventosIndex;
use App\Livewire\Eventos\Show as EventosShow;
use App\Livewire\Roles\Index as RolesIndex;

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

    //Modulo Usuario
    Route::get('/users', Index::class)->name('users.index');
    Route::get('/users/{user}', Show::class)->name('users.show');

    // 🔥 Módulo Tipo Analisis
    Route::get('/tipo-analisis', TipoAnalisisIndex::class)->name('tipo-analisis.index');
    Route::get('/tipo-analisis/{tipo}', TipoAnalisisShow::class)->name('tipo-analisis.show');

    // Módulo Eventos
    Route::get('/eventos', EventosIndex::class)->name('eventos.index');
    Route::get('/eventos/{evento}', EventosShow::class)->name('eventos.show');

    //Roles
    Route::get('/roles', RolesIndex::class)->name('roles.index');

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

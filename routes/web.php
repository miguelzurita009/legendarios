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
use App\Models\User;
use App\Models\Evento;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/inicio', function () {
    // 1. Obtenemos el total de usuarios
    $usuariosRegistrados = User::count();
    // Usamos 'ACTIVO' en mayúsculas por el Mutator del modelo
    $eventosActivos = Evento::where('estado', 'ACTIVO')->count();
    // 2. Pasamos la variable a la vista usando compact o un array
    return view('dashboard.index', compact('usuariosRegistrados', 'eventosActivos'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //usuarios regustrados
    Route::get('/perfil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/perfil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Modulo Usuario
    Route::get('/usuarios', Index::class)->name('users.index');
    Route::get('/usuarios/{user}', Show::class)->name('users.show');

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

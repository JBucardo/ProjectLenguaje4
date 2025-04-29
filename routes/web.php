<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;//esto es muy importante ojo
use App\Http\Controllers\JugadorController;//esto es muy importante ojo

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
});

require __DIR__.'/auth.php';

Route::controller(EquipoController::class)->group(function () {
    //Index ruta para pagina principal o mejor conocida ruta donde se alojara el index

    Route::get('/portada', 'portada')->name('portada.index')->middleware('auth');

    Route::get('/equipos', 'index')->name('equipo.index');

    //Ruta para mostrar un solo equipo: READ o lectura de estudiantes
    Route::get('/equipo/{id}', 'show')->name('equipo.show')->whereNumber('id');

     //Ruta de CREAR equipo mediante un formulario
    Route::get('/equipos/crear', 'create')->name('equipo.create');

    //segunda ruta de crear equipo con metodo post (ruta que recibe el formulario)
    Route::post('/equipos/crear', 'store')->name('equipo.store');

    //Ruta mostrar formulario editar equipo
    Route::get('/equipos/{id}/editar', 'edit')->name('equipo.edit');

    //Ruta mostrar formulario equipo/actualizar
    Route::put('/equipos/{id}/editar', 'update')->name('equipo.update');

   //Ruta para ELIMINAR habitacion
    Route::delete('/equipos/{id}/borrar', 'destroy')->name('equipo.destroy');

});


Route::controller(JugadorController::class)->group(function () {

    Route::get('/portada', 'portada')->name('portada.index')->middleware('auth');
    //Index ruta para pagina principal o mejor conocida ruta donde se alojara el index
    Route::get('/jugadores', 'index')->name('jugador.index');
    //Ruta para mostrar un solo habitacion: READ o lectura de estudiantes
    Route::get('/jugador/{id}', 'show')->name('jugador.show')->whereNumber('id');
     //Ruta de CREAR habitacion mediante un formulario
    Route::get('/jugadoress/crear', 'create')->name('jugador.create');
    //segunda ruta de crear habitacion con metodo post (ruta que recibe el formulario)
    Route::post('/jugadores/crear', 'store')->name('jugador.store');
    //Ruta mostrar formulario editar habitacion
    Route::get('/jugadores/{id}/editar', 'edit')->name('jugador.edit');
    //Ruta mostrar formulario habitacion/actualizar
    Route::put('/jugadores/{id}/editar', 'update')->name('jugador.update');
   //Ruta para ELIMINAR habitacion
    Route::delete('/jugadores/{id}/borrar', 'destroy')->name('jugador.destroy');

});

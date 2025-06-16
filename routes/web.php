<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/crear-partida', function () {
    return Inertia::render('CrearPartida');
})->middleware(['auth', 'verified'])->name('crear.partida');

Route::get('/Mis-partidas', function () {
    return Inertia::render('MisPartidas', [
        'usuario' => Auth::user(), // Usuario autenticado
        'partidas' => [
            ['enemigo' => 'Pirata Morgan'],
            ['enemigo' => 'Capitana Ancla']
        ]
    ]);
    })->middleware(['auth', 'verified'])->name('mis.partidas');

    Route::get('/historial', function () {
    return Inertia::render('Historial');
})->middleware(['auth', 'verified'])->name('historial');

Route::get('/graficas', function () {
    return Inertia::render('Graficas');
})->middleware(['auth', 'verified'])->name('graficas');


require __DIR__.'/auth.php';

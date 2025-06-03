<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReporteController;
use App\Models\Reporte;
use App\Http\Controllers\ChatController;

use App\Http\Controllers\FaqController;

Route::get('/faq', [FaqController::class, 'index'])->name('faq');



//Route::middleware('auth')->group(function () {
//    Route::get('/chat', [ChatController::class, 'index'])->name('chat');
//    Route::post('/chat/send', [ChatController::class, 'send'])->name('chat.send');
//});

// Guardar reporte
Route::post('/reportes', [ReporteController::class, 'store'])->name('reporte.store');

// Página de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Página principal después del login
Route::get('/home', function () {
    $reportes = Reporte::all();
    return view('home', compact('reportes'));
})->middleware(['auth'])->name('home');

// Redirección dashboard
Route::get('/dashboard', function () {
    return redirect()->route('home');
})->middleware(['auth', 'verified'])->name('dashboard');

// Mostrar formulario para crear reportes
Route::get('/reportes/crear', [ReporteController::class, 'create'])->name('reporte.form');

// Rutas de perfil con middleware auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/reportes/borrar-todo', [ReporteController::class, 'borrarTodo'])->name('reportes.borrarTodo');



require __DIR__.'/auth.php';

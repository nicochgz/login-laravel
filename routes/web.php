<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\ConfirmadoController;
use App\Http\Controllers\DefuncionController;
use App\Http\Controllers\NegativoController;
use App\Http\Controllers\SospechosoController;
use App\Http\Controllers\TotalCasosController;
use Illuminate\Support\Facades\Route;

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

Route::resource('/estados',EstadoController::class);
Route::resource('/confirmados',ConfirmadoController::class);

/*Route::resource('/defunciones',DefuncionController::class);
Route::resource('/negativos',NegativoController::class);
Route::resource('/sospechosos',SospechosoController::class);*/

//Route::get('/total-casos', [TotalCasosController::class, 'totalCasos']);
//Route::get('/total-casos-estado/{id}', [TotalCasosController::class, 'totalCasosPorEstado']);

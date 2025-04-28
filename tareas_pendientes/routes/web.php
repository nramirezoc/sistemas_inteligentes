<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController; // Asegúrate de importar el controlador TaskController
use App\Models\Task;

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

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
Route::patch('/tasks/{id}/updateStatus', [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');


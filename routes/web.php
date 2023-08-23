<?php

use App\Models\Task;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Models\User;
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

Route::redirect('/', '/tasks');

Route::middleware('auth')->group(function () {
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

    // view create form
    Route::get('/tasks/new', [TaskController::class, 'create'])->name('tasks.create');
<<<<<<< HEAD
    Route::post('/tasks/new', [TaskController::class, 'store'])->name('tasks.create');
    // confirm task has been posted from spreadsheet
    Route::get('/tasks/{task}/new', [TaskController::class, 'confirmCreate'])->name('tasks.confirmCreate');
=======
    Route::post('/tasks/new', [TaskController::class, 'store'])->name('tasks.store');
    Route::post('/tasks/new/{task}/confirm', [TaskController::class, 'confirm'])->name('tasks.confirmStore');
>>>>>>> d28eb4e5d417fc73c0cd7f1abb211f04c0386f46

    Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');

    // view edit form
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::post('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    // update existing task
    Route::get('/tasks/{task}/update/', [TaskController::class, 'update'])->name('tasks.update');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';

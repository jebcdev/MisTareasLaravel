<?php

use App\Http\Controllers\_SiteController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TasksBy;
use Illuminate\Support\Facades\Route;


Route::get('/', [_SiteController::class, 'index'])->name('index');



Route::middleware(['auth'])->group(function () {

    Route::get('/admin', [_SiteController::class, 'admin'])->name('admin.index');
    Route::resource('/admin/categories', CategoryController::class)->names('admin.categories');
    Route::put('/admin/categories/{id}/restore', [CategoryController::class, 'restore'])->name('admin.categories.restore');

    Route::resource('/tasks', TaskController::class)->names('tasks');
    Route::put('/tasks/{id}/restore', [TaskController::class, 'restore'])->name('tasks.restore');


    Route::get('/notes/create/{task}', [NoteController::class, 'create'])->name('notes.create');
    Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
    Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');

    Route::get('/tasksbycategory', [TasksBy::class, 'category'])->name('tasksbycategory.index');
    Route::get('/tasksbystatus', [TasksBy::class, 'status'])->name('tasksbystatus.index');
});






















/* --------------- */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

<?php

use App\Charts\ProjectsProgressPieChart;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MaterialUnitController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskMaterialController;
use App\Http\Controllers\UserController;
use App\Models\TaskMaterial;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'authenticate'])->name('authenticate');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/chart', function (ProjectsProgressPieChart $chart) {
    
    return view('chart', ['chart' => $chart->build()]);
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware(['auth']);

// USER
Route::prefix('dashboard/users')->middleware(['auth'])->group(function() {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/create', [UserController::class, 'store'])->name('users.store');
    Route::post('/{user}/suspend', [UserController::class,'suspend'])->name('users.suspend');
    Route::post('/{user}/restore', [UserController::class, 'restore'])->name('users.restore');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/{id}', [UserController::class, 'update'])->name('users.update');
});

// Material unit
Route::prefix('dashboard/units')->middleware(['auth'])->group(function() {
    Route::get('/', [MaterialUnitController::class, 'index'])->name('unit.index');
    Route::get('/create', [MaterialUnitController::class, 'create'])->name('unit.create');
    Route::post('/create', [MaterialUnitController::class, 'store'])->name('unit.store');
    Route::post('/{id}/delete', [MaterialUnitController::class,'destroy'])->name('unit.delete');
    Route::post('/{id}/restore', [MaterialUnitController::class, 'restore'])->name('unit.restore');
    Route::get('/{id}/edit', [MaterialUnitController::class, 'edit'])->name('unit.edit');
    Route::put('/{id}', [MaterialUnitController::class, 'update'])->name('unit.update');
});

// Project
Route::prefix('dashboard/projects')->middleware(['auth'])->group(function() {
    Route::get('/', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/{id}', [ProjectController::class, 'detail'])->name('projects.detail');
    Route::post('/store', [ProjectController::class, 'store'])->name('projects.store')->middleware('manager');
    Route::delete('/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy')->middleware('manager');
    Route::get('/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit')->middleware('manager');
    Route::put('/{id}', [ProjectController::class, 'update'])->name('projects.update')->middleware('manager');
});

// Task
Route::prefix('dashboard/projects/{pid}/tasks')->middleware(['auth'])->group(function(){
    Route::get('/{id}', [TaskController::class, 'detail'])->name('tasks.detail');
    Route::post('/store', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/{id}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});

// Task Materials
Route::prefix('dashboard/projects/{pid}/tasks/{id}/materials')->middleware(['auth'])->group(function(){
    Route::post('/store', [TaskMaterialController::class, 'store'])->name('materials.store');
    Route::delete('/{mid}', [TaskMaterialController::class, 'destroy'])->name('materials.destroy');
});


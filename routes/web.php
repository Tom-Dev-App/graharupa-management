<?php

use App\Charts\ProjectsProgressPieChart;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskMaterialController;
use App\Http\Controllers\UserController;
use App\Models\TaskMaterial;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'authenticate'])->name('authenticate');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function()  {
    return view('pages.dashboard.index');
});

Route::get('/chart', function (ProjectsProgressPieChart $chart) {

    return view('chart', ['chart' => $chart->build()]);
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');


// USER
Route::get('/dashboard/users', [UserController::class, 'index'])->name('users.index');
Route::get('/dashboard/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/dashboard/users/create', [UserController::class, 'store'])->name('users.store');
Route::post('/dashboard/users/{user}/suspend', [UserController::class,'suspend'])->name('users.suspend');
Route::post('/dashboard/users/{user}/restore', [UserController::class, 'restore'])->name('users.restore');
Route::get('/dashboard/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/dashboard/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::post('/dashboard/users/{user}/assign-role', [UserController::class, 'assignRole'])->name('users.assignRole');

// PROJECT
Route::get('/dashboard/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/dashboard/projects/{id}', [ProjectController::class, 'detail'])->name('projects.detail');
// Route::get('/dashboard/projects/create', [ProjectController::class, 'create'])->name('projects.create');
// Route::post('/dashboard/projects/create', [ProjectController::class, 'store'])->name('projects.store');


Route::get('/dashboard/projects/{project}/task', [TaskController::class, 'create'])->name('task.create');
Route::post('/dashboard/projects/{project}/task', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/dashboard/projects/{project}/task/{id}', [TaskController::class, 'detail'])->name('tasks.detail');
Route::get('/dashboard/projects/{project}/task/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/dashboard/projects/{project}/task/{id}/edit', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/dashboard/projects/{project}/task/{id}', [TaskController::class, 'delete'])->name('tasks.delete');

Route::get('/dashboard/projects/{project}/task-material', [TaskMaterialController::class, 'index'])->name('task.material.index');
Route::get('/dashboard/projects/{project}/task-material/create', [TaskMaterialController::class, 'create'])->name('task.material.create');
Route::post('/dashboard/projects/{project}/task-material/create', [TaskMaterialController::class, 'store'])->name('task.material.store');
Route::get('/dashboard/projects/{project}/task-material/{id}', [TaskMaterialController::class, 'detail'])->name('task.material.detail');
Route::get('/dashboard/projects/{project}/task-material/{id}/edit', [TaskMaterialController::class, 'edit'])->name('task.material.edit');
Route::post('/dashboard/projects/{project}/task-material/{id}/edit', [TaskMaterialController::class, 'store'])->name('task.material.update');
Route::delete('/dashboard/projects/{project}/task-material/{id}', [TaskMaterialController::class, 'destroy'])->name('task.material.delete');

// Route::get('');


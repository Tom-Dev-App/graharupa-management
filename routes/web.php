<?php

use App\Charts\ProjectsProgressPieChart;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManagerUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function()  {
    return view('pages.dashboard.index');
});

Route::get('/chart', function (ProjectsProgressPieChart $chart) {

    return view('chart', ['chart' => $chart->build()]);
});

Route::get('/dashboard', [DashboardController::class, 'index']);

// Route::get('/ajax/users', [ManagerUserController::class, 'ajaxAll']);
// Route::get('/dashboard/users', [ManagerUserController::class, 'index'])->name('dashboard.users.index');
// Route::get('/dashboard/users/create', [ManagerUserController::class, 'create'])->name('dashboard.users.create');
// Route::post('/dashboard/users', [ManagerUserController::class, 'store'])->name('dashboard.users.store');
// Route::get('/dashboard/users/{user}', [ManagerUserController::class, 'show'])->name('dashboard.users.show');
// Route::get('/dashboard/users/{user}/edit', [ManagerUserController::class, 'edit'])->name('dashboard.users.edit');
// Route::put('/dashboard/users/{user}', [ManagerUserController::class, 'update'])->name('dashboard.users.update');
// Route::delete('/dashboard/users/{user}', [ManagerUserController::class, 'destroy'])->name('dashboard.users.suspend');
// Route::post('/dashboard/users/{user}/restore', [ManagerUserController::class, 'restore'])->name('dashboard.users.restore');
// Route::post('/dashboard/users/{user}/assign-role', [ManagerUserController::class, 'assignRole'])->name('dashboard.users.assignRole');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/data', [UserController::class, 'getUsersData'])->name('users.data');
Route::post('/users/{user}/suspend', [UserController::class,'suspend'])->name('users.suspend');
Route::post('/users/{user}/restore', [UserController::class, 'restore'])->name('users.restore');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.update');
Route::post('/users/{user}/assign-role', [UserController::class, 'assignRole'])->name('users.assignRole');

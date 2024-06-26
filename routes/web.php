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

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');


Route::get('/dashboard/users', [UserController::class, 'index'])->name('users.index');
Route::get('/dashboard/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/dashboard/users/create', [UserController::class, 'store'])->name('users.store');
Route::post('/dashboard/users/{user}/suspend', [UserController::class,'suspend'])->name('users.suspend');
Route::post('/dashboard/users/{user}/restore', [UserController::class, 'restore'])->name('users.restore');
Route::get('/dashboard/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::post('/dashboard/users/{user}/edit', [UserController::class, 'update'])->name('users.update');
Route::post('/dashboard/users/{user}/assign-role', [UserController::class, 'assignRole'])->name('users.assignRole');

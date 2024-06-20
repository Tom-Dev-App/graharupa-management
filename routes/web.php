<?php

use App\Charts\ProjectsProgressPieChart;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManagerUserController;
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

Route::get('manager/users', [ManagerUserController::class, 'index'])->name('manager.users.index');
Route::get('manager/users/create', [ManagerUserController::class, 'create'])->name('manager.users.create');
Route::post('manager/users', [ManagerUserController::class, 'store'])->name('manager.users.store');
Route::get('manager/users/{user}', [ManagerUserController::class, 'show'])->name('manager.users.show');
Route::get('manager/users/{user}/edit', [ManagerUserController::class, 'edit'])->name('manager.users.edit');
Route::put('manager/users/{user}', [ManagerUserController::class, 'update'])->name('manager.users.update');
Route::delete('manager/users/{user}', [ManagerUserController::class, 'destroy'])->name('manager.users.destroy');
Route::post('manager/users/{user}/restore', [ManagerUserController::class, 'restore'])->name('manager.users.restore');
Route::post('manager/users/{user}/assign-role', [ManagerUserController::class, 'assignRole'])->name('manager.users.assignRole');
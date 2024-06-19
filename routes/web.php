<?php

use App\Charts\ProjectsProgressPieChart;
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
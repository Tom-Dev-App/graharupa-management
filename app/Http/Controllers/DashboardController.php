<?php

namespace App\Http\Controllers;

use App\Charts\ProjectsProgressPieChart;
use App\Charts\TasksProgressPieChart;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(ProjectsProgressPieChart $projectChart, TasksProgressPieChart $taskChart) {
        return view('pages.dashboard.index', [
             "projectChart" =>$projectChart->build(), 
             "taskChart" => $taskChart->build(),
        ]);
    }
}

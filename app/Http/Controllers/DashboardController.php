<?php

namespace App\Http\Controllers;

use App\Charts\OnHoldProjectProgress;
use App\Charts\OnProgressProjectProgress;
use App\Charts\ProjectsProgressPieChart;
use App\Charts\TasksProgressPieChart;
use App\Models\Project;
use App\Models\Status;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(ProjectsProgressPieChart $projectChart, TasksProgressPieChart $taskChart, OnProgressProjectProgress $onProgressProgress, OnHoldProjectProgress $onHoldProgress) {

        $ProjectCounts = Project::all()->count(); // Count of all projects
        $onProgressProjectCounts = Project::where('status_id', Status::ON_PROGRESS)->count(); // Count of on-progress projects
        $onHoldProjectCounts = Project::where('status_id', Status::ON_HOLD)->count(); // Count of on-hold projects
        // dd([
        //     "projectCounts" => $ProjectCounts, // Added key for ProjectCounts
        //      "onHoldCounts" => $onHoldProjectCounts, // Added key for onHoldProjectCounts
        //      "onProgressCounts" => $onProgressProjectCounts // Added key for onProgressProjectCounts
        // ]);
        return view('pages.dashboard.index', [
             "projectChart" =>$projectChart->build(), 
             "onProgress" => $onProgressProgress->build(),
             "onHold" => $onHoldProgress->build(),
             "projectCounts" => $ProjectCounts, // Added key for ProjectCounts
             "onHoldCounts" => $onHoldProjectCounts, // Added key for onHoldProjectCounts
             "onProgressCounts" => $onProgressProjectCounts // Added key for onProgressProjectCounts
        ]);
    }
}
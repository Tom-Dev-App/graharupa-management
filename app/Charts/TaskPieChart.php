<?php

namespace App\Charts;

use App\Models\Project;
use App\Models\Status;
use App\Models\Task;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Http\Request;

class TaskPieChart
{
    protected $projectId;
    protected $chart;

    public function __construct(LarapexChart $chart, $projectId)
    {
        $this->chart = $chart;
        $this->projectId = $projectId;
    }
   
    public function build(){
    $task_completed_count = Task::where('project_id', $this->projectId)
        ->where('status_id', Status::DONE)
        ->count();

        $task_progress_count = Task::where('project_id', $this->projectId)
                ->where('status_id', Status::ON_PROGRESS)
                ->count();

        $task_hold_count = Task::where('project_id', $this->projectId)
        ->where('status_id', Status::ON_HOLD)
        ->count();

        $task_canceled_count = Task::where('project_id', $this->projectId)
            ->where('status_id', Status::CANCELED)
            ->count();

        return $this->chart->pieChart()
        ->addData([$task_progress_count, $task_hold_count, $task_completed_count, $task_canceled_count])
        ->setColors(['#4BA6EF', '#ffbf53', '#2ab57d', '#FD625E'])
        ->setLabels([
        'On Progress ' . $task_progress_count, 
        'On Hold ' . $task_hold_count, 
        'Done ' . $task_completed_count, 
        'Canceled ' . $task_canceled_count
        ]);
    }
}
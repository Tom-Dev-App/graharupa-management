<?php

namespace App\Charts;

use App\Models\Project;
use App\Models\Status;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class ProjectsProgressPieChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    } 
   
    public function build()
    {

        $project_completed_count = Project::where('status_id', Status::DONE)->count();

        $project_progress_count = Project::where('status_id', Status::ON_PROGRESS)->count();
        
        $project_hold_count = Project::where('status_id', Status::ON_HOLD)->count();

        $project_canceled_count = Project::where('status_id', Status::CANCELED)->count();
        return $this->chart->pieChart()
            // ->setTitle('Project Progress')
            ->addData([$project_progress_count, $project_hold_count, $project_completed_count, $project_canceled_count])
            ->setColors(['#4BA6EF', '#ffbf53', '#2ab57d', '#FD625E'])
            ->setLabels(['On Progress '. $project_progress_count, 'On Hold '.$project_hold_count, 'Done '.$project_completed_count, 'Canceled '.$project_canceled_count]);
    }
}
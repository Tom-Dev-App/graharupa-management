<?php

namespace App\Charts;

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
        return $this->chart->pieChart()
            // ->setTitle('Project Progress')
            ->addData([40, 50, 30, 20])
            ->setColors(['#4BA6EF', '#ffbf53', '#2ab57d', '#FD625E'])
            ->setLabels(['On Progress', 'On Hold', 'Done', 'Canceled']);
    }
}
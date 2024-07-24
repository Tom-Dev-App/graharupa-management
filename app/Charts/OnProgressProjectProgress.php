<?php

namespace App\Charts;

use App\Models\Project;
use App\Models\Status;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class OnProgressProjectProgress
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {
        // Define the ranges for progress percentages
        $ranges = [
            '0-25%' => [0, 25],
            '26-50%' => [26, 50],
            '51-75%' => [51, 75],
            '76-100%' => [76, 100],
        ];

        // Initialize counters
        $dataCounts = [
            '0-25%' => 0,
            '26-50%' => 0,
            '51-75%' => 0,
            '76-100%' => 0,
        ];

        // Count projects in each range where the status is 'ON_PROGRESS'
        foreach ($ranges as $label => [$min, $max]) {
            $dataCounts[$label] = Project::whereBetween('percentage', [$min, $max])
                ->where('status_id', Status::ON_PROGRESS)
                ->count();
        }

        return $this->chart->pieChart()
            ->addData(array_values($dataCounts))
            ->setColors(['#FD625E', '#FFBF53', '#4BA6EF', '#2AB57D'])
            ->setLabels(array_map(
                fn($label, $count) => "$label: $count",
                array_keys($dataCounts),
                array_values($dataCounts)
            ));
    }
}

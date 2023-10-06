<?php

namespace App\Charts;

use App\Models\Surat;
use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class UserChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $surats = Surat::all();
        $user = User::all();

        $data = $user->map(function ($us) use ($surats) {
            return $surats->where('id_user', $us->id)->count();
        });

        $labels = $user->pluck('username')->toArray();
        return $this->chart->pieChart()
            ->setTitle('User Teraktif')
            ->setSubtitle(date('Y'))
            ->addData($data->toArray())
            ->setHeight(300)
            ->setLabels($labels);
    }
}

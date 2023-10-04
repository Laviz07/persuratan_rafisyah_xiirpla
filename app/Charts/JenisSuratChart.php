<?php

namespace App\Charts;

use App\Models\JenisSurat;
use App\Models\Surat;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class JenisSuratChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {

        $surats = Surat::all();
        $jenisSurat = JenisSurat::all();

        $data = $jenisSurat->map(function ($js) use ($surats) {
            return $surats->where('id_jenis_surat', $js->id)->count();
        });

        $labels = $jenisSurat->pluck('jenis_surat')->toArray();

        return $this->chart->pieChart()
            ->setTitle('Jenis Surat Yang Banyak Digunakan')
            ->setSubtitle(date('Y'))
            ->addData($data->toArray())
            ->setHeight(300)
            ->setLabels($labels);
    }
}

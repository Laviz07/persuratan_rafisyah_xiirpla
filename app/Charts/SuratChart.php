<?php

namespace App\Charts;

use App\Models\Surat;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class SuratChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {

        $surats = Surat::all();
        $months = [
            'January',
            'February',
            'March',
            'April',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];
        $data = [];

        foreach ($months as $month) {
            $suratsInMonth = $surats->filter(function ($surat) use ($month) {
                $tanggalSurat = $surat->tanggal_surat;
                $formattedMonts = date('F', strtotime($tanggalSurat));

                return $formattedMonts == $month;
            });

            $data[] = $suratsInMonth->count();
        };

        return $this->chart->barChart()
            ->setTitle('Monthly Data Surat ')
            ->setSubtitle(date('Y'))
            ->setXAxis($months)
            ->setWidth(1000)
            ->setHeight(333)
            ->addData('Surat', $data);
    }
}

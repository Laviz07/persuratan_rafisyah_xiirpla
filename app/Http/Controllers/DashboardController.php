<?php

namespace App\Http\Controllers;

use App\Charts\JenisSuratChart;
use App\Charts\SuratChart;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(SuratChart $suratChart, JenisSuratChart $jsChart)
    {
        $data = [
            'suratChart' => $suratChart->build(),
            'jsChart' => $jsChart->build()
        ];

        return view('dashboard.index', $data);
    }
}

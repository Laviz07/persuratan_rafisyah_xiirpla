<?php

namespace App\Http\Controllers;

use App\Charts\JenisSuratChart;
use App\Charts\SuratChart;
use App\Charts\UserChart;
use App\Models\JenisSurat;
use App\Models\Log;
use App\Models\Surat;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(SuratChart $suratChart, JenisSuratChart $jsChart, UserChart $userChart)
    {
        $data = [
            // CHARTS
            'suratChart' => $suratChart->build(),
            'jsChart' => $jsChart->build(),
            'userChart' => $userChart->build(),

            // COUNT
            'surat' => Surat::query()->count(),
            'jsurat' => JenisSurat::query()->count(),
            'user' => User::query()->count(),
            'logs' => Log::query()->count()
        ];

        return view('dashboard.index', $data);
    }
}

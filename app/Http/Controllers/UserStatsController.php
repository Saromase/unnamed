<?php

namespace App\Http\Controllers;

use App\UserStats;

class UserStatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function displayInventory()
    {
        $stats = UserStats::get();
        \Log::info($stats);
        echo $stats;
        foreach ($stats as $datas) {
            echo " Argent : " . $datas->money;
            echo " Vie : " . $datas->life;
        }
    }
}

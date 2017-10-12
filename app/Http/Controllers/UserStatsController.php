<?php

namespace App\Http\Controllers;

use App\Models\UserStats;
use Illuminate\Support\Facades\Auth;

class UserStatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function displayUserStats()
    {
        $userId = Auth::user()->id;
        $userStats = UserStats::findOneByUserId($userId);
        return view('home', [
            'user' => $userStats
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Stockage;
use App\UserStats;

class StockageController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function displayStorages(){
        $id = Auth::user()->id;
        $storageId = UserStats::where('user_id', '=', "$id")->select('user_storage')->get();
        foreach ($storageId as $idS){}
        \Log::info($idS->user_storage);
        $playerStorage = Stockage::where('id', '=', "$idS->user_storage")->get();
        \Log::info($playerStorage);
        return view('storage', [
            'storage' => $playerStorage
        ]);
    }
}

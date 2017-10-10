<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Storage;
use App\UserStats;
use App\Inventory;

class StockageController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function displayStorages(){
        $id = Auth::user()->id;
        $storageId = UserStats::where('user_id', '=', "$id")->select('user_storage')->get();
        $inventoryId = UserStats::where('user_id', '=', "$id")->select('user_inventory')->get();
        foreach ($storageId as $idS){}
        $playerStorage = Storage::where('id', '=', "$idS->user_storage")->get();
        foreach ($inventoryId as $idI){}
        $inventory = Inventory::where('id', '=', "$id")->get();
        \Log::info($inventory);
        foreach ($inventory as $inv){}
        \Log::info($inv->water);
        return view('storage', [
            'storage' => $playerStorage,
            'tutu' => $inventory
        ]);
    }
}

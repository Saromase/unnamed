<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Storage;
use App\UserStats;
use App\Inventory;
use App\Products;

class StorageController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function displayStorages() {
        $userId = Auth::user()->id;
        $storageId = UserStats::where('user_id', '=', "$userId")->select('user_storage')->get();
        $inventoryId = UserStats::where('user_id', '=', "$userId")->select('user_inventory')->get();
        foreach ($storageId as $idS){}
        $playerStorage = Storage::where('id', '=', "$idS->user_storage")->get();
        foreach ($inventoryId as $idI){}
        $inventory = Inventory::where('id', '=', "$userId")->get();
        \Log::info($inventory);
        foreach ($inventory as $inv){}
        \Log::info($inv->water);
        $productsName = Products::select('name')->get();
        $productsNumber = [];
        foreach ($inventory as $material) {
          foreach ($productsName as $productName) {
            $productName = $productName->name;
            array_push($productsNumber, $material->$productName);
          }
        }
        return view('storage', [
            'storage' => $playerStorage,
            'inventory' => $inventory,
            'productsName' => $productsName,
            'productsNumber' => $productsNumber
        ]);
    }


}

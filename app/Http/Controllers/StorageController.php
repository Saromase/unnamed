<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Storage;
use App\Models\UserStats;
use App\Models\Inventory;
use App\Models\Products;

class StorageController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function displayStorages() {
        $userId = Auth::user()->id;

        // On recupere l'id du storage que possède l'utilisateur
        $storageId = UserStats::where('user_id', '=', "$userId")
            ->select('user_storage')
            ->get()
            ->first();

        // On recupere l'ensemble des informations liée à ce storage qu'on envoie à la vue
        $playerStorage = Storage::where('id', '=', "$storageId->user_storage")
            ->get()
            ->first();

        // On recupere l'ensemble des inventaires de l'utilisateur
        $inventory = Inventory::where('user_id', '=', "$userId")
            ->get();
        
        // On verifie si il possede un inventaire si il est vide on lui met un message
        if ($inventory == null){
            $message = 'Vous n\'avez aucun produit !';
            return view('storage', [
                'storage' => $playerStorage,
                'warning' => $message
            ]);
        } else {
            return view('storage', [
                'storage' => $playerStorage,
                'inventory' => $inventory
            ]);
        }


        
    }


}

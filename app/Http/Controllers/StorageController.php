<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Storage;

class StorageController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * @return Factory|View
     */
    public function displayStorages() {
        // On recupere l'ensemble des informations liée à ce storage qu'on envoie à la vue
        $playerStorage = Auth::user()->getUserStats()->getStorage();

        // On recupere l'ensemble des inventaires de l'utilisateur
        $inventory = Auth::user()->getInventory();

        // On récupère la money de l'utilisateur
        $playerMoney = Auth::user()->getUserStats()->getmoney();

        // id de storage upgrader
        $playerStorageId = $playerStorage->id + 1;

        // On récupère la valeur de l'amélioration du storage
        $storageUpgrade = Storage::findOneById($playerStorageId);

        // On verifie si il possede un inventaire si il est vide on lui met un message
        if ($inventory->isEmpty()) {
            return view('storage', [
                'storage' => $playerStorage,
                'warning' => 'Vous n\'avez aucun produit !',
                'inventory' => $inventory
            ]);
        } else {
            return view('storage', [
                'storage' => $playerStorage,
                'inventory' => $inventory,
                'playerMoney' => $playerMoney,
                'storageUpgrade' => $storageUpgrade

            ]);
        }
    }

}

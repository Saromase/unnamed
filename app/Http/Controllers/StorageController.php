<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use App\Models\Storage;

class StorageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return Factory|View
     */
    public function displayStorages()
    {
        // On recupere l'ensemble des informations liée à ce storage qu'on envoie à la vue
        $playerStorage = $this->getUser()->getStorage();

        // On recupere l'ensemble des inventaires de l'utilisateur
        $inventory = $this->getUser()->getInventory();

        // On récupère la money de l'utilisateur
        $playerMoney = $this->getUser()->getMoney();

        // On récupère l'id du storage actuel
        $playerStorageId = $playerStorage->id;


        // On récupére l'id du dernier storage
        $lastStorage = Storage::select('id')->get()->last()->id;

        if ($lastStorage === $this->getUser()->storage_id) {
            return view('storage', [
                'storage' => $playerStorage,
                'inventory' => $inventory
            ]);
        } else {
            // id du futur storage
            $futureStorageId = $playerStorageId + 1;

            // On récupère la valeur de l'amélioration du storage
            $upgradePrice = Storage::findOneById($futureStorageId)->price;
            // On verifie si il possede un inventaire si il est vide on lui met un message
            if ($inventory->isEmpty()) {
                session()->flash('warning', 'Vous n\'avez aucun produit !');
                return view('storage', [
                    'storage' => $playerStorage,
                    'inventory' => $inventory,
                    'playerMoney' => $playerMoney,
                    'upgradePrice' => $upgradePrice
                ]);
            } else {
                return view('storage', [
                    'storage' => $playerStorage,
                    'inventory' => $inventory,
                    'playerMoney' => $playerMoney,
                    'upgradePrice' => $upgradePrice
                ]);
            }
        }
    }
}

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
        $playerStorage = $this->getUser()->getStorage();
        $inventory = $this->getUser()->getInventory();
        $playerMoney = $this->getUser()->getMoney();
        $playerStorageId = $playerStorage->getId();

        // On récupére le dernier storage
        $lastStorage = Storage::get()->last();

        if ($lastStorage === $this->getUser()->getStorage()) {
            return view('storage', [
                'storage' => $playerStorage,
                'inventory' => $inventory
            ]);
        } else {
            // id du futur storage
            $futureStorageId = $playerStorageId + 1;

            // On récupère la valeur de l'amélioration du storage
            $upgradePrice = Storage::findOneById($futureStorageId)->getPrice();
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

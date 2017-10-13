<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use App\Models\Storage;
use App\Models\UserStats;

class StorageController extends Controller {

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
        $playerMoney = Auth::user()->getUserStats()->getMoney();

        // On récupère l'id du storage actuel
        $playerStorageId = $playerStorage->id;

        // on récupère le nombre de stockage
        $storageMax = last(Storage::select('id')->get());

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
        }

        else {
            return view('storage', [
                'storage' => $playerStorage,
                'inventory' => $inventory,
                'playerMoney' => $playerMoney,
                'upgradePrice' => $upgradePrice
            ]);
        }
    }

    /**
    * @return var session
    */
    public function storageUpgrade() {
      // on récupère les stats de l'utilisateur
      $playerStats = Auth::user()->getUserStats();

      $playerId = $playerStats->getId();

      // On recupere l'id du storage actuel
      $playerStorage = $playerStats->getStorage();

      // On recupere l'ensemble des inventaires de l'utilisateur
      $inventory = Auth::user()->getInventory();

      // id de storage upgrader
      $futureStorageId = $playerStorage->getId() + 1;

      // prix de l'upgrade
      $upgradePrice = Storage::findOneById($futureStorageId)->price;

      // On récupère la money de l'utilisateur
      $playerMoney = $playerStats->getMoney();

      if ($playerMoney >= $upgradePrice) {
          UserStats::findOneByUserId($playerId)
              ->setStorageId($futureStorageId)
              ->setMoney($playerMoney - $upgradePrice)
              ->save();

          return redirect('storage')->with('success', 'Amélioration réussie.');

      } elseif ($playerMoney < $upgradePrice) {
          return redirect('storage')->with('warning', 'Vous n\'avez pas assez d\'argent !');
      } else {
        return redirect('storage')->with('warning', 'Erreur !!!');
      }

    }

}

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

        // id de storage upgrader
        $playerStorageId = $playerStorage->id + 1;

        // On récupère la valeur de l'amélioration du storage
        $upgradePrice = Storage::findOneById($playerStorageId)->price;

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
                'upgradePrice' => $upgradePrice
            ]);
        }
    }

    // Fonction d'amélioration du storage
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

          // actualise les données de l'utilisateur pour que les données renvoyé soit à jour
          $playerStats = Auth::user()->getUserStats();
                        
          return view('storage', [
              'storage' => $playerStorage,
              'inventory' => $inventory,
              'playerMoney' => $playerMoney,
              'upgradePrice' => $upgradePrice,
              'success' => 'Votre stockage a bien été améliorer.'
          ]);
      } elseif ($playerMoney < $upgradePrice) {
          return view('storage', [
              'storage' => $playerStorage,
              'inventory' => $inventory,
              'playerMoney' => $playerMoney,
              'upgradePrice' => $upgradePrice,
              'warning' => 'Vous n\'avez pas assez d\'argent !'
          ]);
      } else {
        return view('storage', [
            'storage' => $playerStorage,
            'inventory' => $inventory,
            'playerMoney' => $playerMoney,
            'upgradePrice' => $upgradePrice,
            'warning' => 'Erreur !!!'
        ]);
      }

    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

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

        // On verifie si il possede un inventaire si il est vide on lui met un message
        if ($inventory == null){
            return view('storage', ['storage' => $playerStorage, 'warning' => 'Vous n\'avez aucun produit !']);
        } else {
            return view('storage', ['storage' => $playerStorage, 'inventory' => $inventory]);
        }
    }


}

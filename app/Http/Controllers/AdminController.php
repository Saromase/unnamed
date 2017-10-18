<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
    * @return Factory|View
    */
    public function displayHomeAdminPanel()
    {
        return view('admin', [
            'user' => User::get()
        ]);
    }

    /**
     * @return Factory|View
     */
    public function displayProductsAdminPanel(){
        // Je recupere l'ensemble des données de la table products
        $products = Products::get();

        return view('admin', [
            'products' => $products
        ]);
    }
}

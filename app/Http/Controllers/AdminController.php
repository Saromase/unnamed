<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * @return Factory|View
     */
    public function displayAdminPanel(){
        // Je recupere l'ensemble des données de la table products
        $products = Products::get();
        
        return view('admin', [
            'products' => $products
        ]);
    }
}

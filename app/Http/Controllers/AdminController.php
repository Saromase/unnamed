<?php

namespace App\Http\Controllers;

use App\Models\Products;

class AdminController extends Controller
{
    public function displayAdminPanel(){
        // Je recupere l'ensemble des données de la table products
        $products = Products::get();
        
        return view('admin', [
            'products' => $products
        ]);
    }
}

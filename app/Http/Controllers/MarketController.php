<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\UserStats;
use App\Models\Products;
use App\Models\Inventory;

class MarketController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }

  public function displayProducts() {
    $products = Products::get();
    /** @var Products $product */
    $product = $products->first();

    $product->setMinPrice("test");

    return view('market', ['products' => $products]);
  }
    public function buyProduct($id) {
        $productInfo = Products::whereId($id)->get();
        $userId = Auth::user()->id;
        $playerInfo = UserStats::whereId($userId)->get();
        $debug = $productInfo[0]->id;
        $products = Products::get();
        if ($playerInfo[0]->money >= $productInfo[0]->price && $playerInfo[0]->max_inventory > 0 ){
            UserStats::whereId($userId)->setMoney(10000);
            
            
            
            $message = 'Vous avez bien acheter un blabla';
           return view('market', [
                'products' => $products,
                'success' => $message
            ]);
        } else if ($playerInfo[0]->money <= $productInfo[0]->price){
            $message = 'Vous n\'avez pas assez d\'argent pour acheter ce ' . $productInfo[0]->name;
            return view('market', [
                'products' => $products,
                'faillure' => $message
            ]);
        } else if ($playerInfo[0]->max_inventory == 0){
            $message = 'Vous n\'avez pas assez de place pour acheter ce ' . $productInfo[0]->name;
            return view('market', [
                'products' => $products,
                'faillure' => $message
            ]);
        }
    }
}

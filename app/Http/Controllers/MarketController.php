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
        return view('market', [
            'products' => $products
        ]);
    }
    public function buyProduct($id) {
        $user = Auth::user();
        $userId = Auth::user()->id;
        $userStats = $user->getUserStats();
        $productsBuy = Products::findOneById($id);
        $products = Products::get();

        if($userStats->money >= $productsBuy->price && $userStats->inventory != 0){
            
            $userStatsInventory = $userStats->getInventory();
            $userStatsInventory--;
            $userStats->setInventory($userStatsInventory)->save();
            $userStats->setMoney($userStats->money - $productsBuy->price)->save();
            
            $inventory = Inventory::findOneBy([
                'user_id' => $userId, 
                'name' => $productsBuy->name
            ]);
            if ($inventory === null){
                Inventory::insert([
                    'name' => $productsBuy->getName(),
                    'user_id' => $user->getId(),
                    'buy_price' => $productsBuy->getPrice(),
                    'quantity' => 1,
                    'created_at' => null,
                    'updated_at' => null
                    
                ]);
            } else {
                $productQuantity = $inventory->quantity;
                $productQuantity++;
                Inventory::findOneByUserId($userId)
                    ->findOneByName($productsBuy->name)
                    ->setQuantity($productQuantity)
                    ->save();
            }
            
            
            $message = 'Vous avez bien buy';
            
            return view('market', [
                'success' => $message,
                'products' => $products
            ]);
        } else if ($userStats->inventory == 0){
            $message = 'Vous n\'avez pas assez de place';
            return view('market', [
                'faillure' => $message,
                'products' => $products
            ]);
        } else if ($userStats->money < $productsBuy->price){
            $message = 'Vous n\'avez pas assez d\'argent ';
            return view('market', [
                'faillure' => $message,
                'products' => $products
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use App\Models\Products;
use App\Models\Inventory;
use Illuminate\View\View;

class MarketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return Factory|View
     */
    public function displayProducts()
    {
        $products = Products::get();
        return view('market', [
            'products' => $products
        ]);
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function buyProduct($id)
    {
        $user = $this->getUser();
        $productsBuy = Products::findOneById($id);

        if ($user->getInventorySize() == 0) {
            return redirect('market')->with('warning','Vous ne posséder pas ce produit');
        } else if ($user->getMoney() < $productsBuy->getPrice()) {
            return redirect('market')->with('warning','Vous ne posséder pas ce produit');
        } else {
            $user->subInventorySize(1)->save();
            $user->subMoney($productsBuy->getPrice())->save();

            if (null === $inventory = Inventory::findOneBy(['user_id' => $user, 'name' => $productsBuy->name])) {
                Inventory::insert([
                    'name' => $productsBuy->getName(),
                    'user_id' => $user->getId(),
                    'buy_price' => $productsBuy->getPrice(),
                    'quantity' => 1,
                    'created_at' => new Carbon(),
                    'updated_at' => new Carbon()
                ]);
            } else {
                Inventory::findOneByUserId($user)
                    ->findOneByName($productsBuy->name)
                    ->setQuantity($inventory->quantity + 1)
                    ->save();
            }

            return redirect('market')->with('success','Vous avez bien acheter ce produit');
        }

    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function sellProduct($id)
    {
        $user = $this->getUser();
        $productsBuy = Products::findOneById($id);
        $inventory = Inventory::findOneBy(['user_id' => $user, 'name' => $productsBuy->name]);

        if ($inventory === null) {
            return redirect('market')->with('warning','Vous ne posséder pas ce produit');
        } else if ($inventory->quantity === 0) {
            return redirect('market')->with('warning','Vous ne posséder pas ce produit');
        } else {
            $user->addInventorySize(1)->addMoney($productsBuy->price)->save();

            Inventory::findOneByUserId($user)
                ->findOneByName($productsBuy->name)
                ->setQuantity($inventory->quantity - 1)
                ->save();

            return redirect('market')->with('success','Vous avez bien vendu ce produit');
        }
    }
    public function sellAll($id){
        // Je récupere l'ensemble des données utilisateur
        $user = $this->getUser();
        // Je recherche le produit qu'il souhaite vendre
        $productsBuy = Products::findOneById($id);
        // Je recupere la liste des produits 
        $products = Products::get();
        // Je récupere l'inventaire du produit pour l'utilisateur
        $inventory = Inventory::findOneBy(['user_id' => $user, 'name' => $productsBuy->name]);
        
        // Si l'inventaire est null
        if ($inventory === null) {
            return redirect('market')->with('warning','Vous ne posséder pas ce produit');
        } else if ($inventory->quantity === 0) { // Si la quantity est egale à 0
            return redirect('market')->with('warning','Vous ne posséder pas ce produit');
        } else {
            // Je récupere le nombre d'objet que l'utilisateur veux vendre
            $quantityToSell = $inventory->quantity;
            
            $user->addInventorySize($quantityToSell)->addMoney($productsBuy->price * $quantityToSell)->save();
            Inventory::findOneByUserId($user)
                ->findOneByName($productsBuy->name)
                ->setQuantity(0)
                ->save();
            
            return redirect('market')->with('success','Vous avez tout vendu, et ainsi obtenu '. $productsBuy->price * $quantityToSell);
        }
    }

}

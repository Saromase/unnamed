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
        $products = Products::get();

        if ($user->getInventorySize() == 0) {
            return view('market', [
                'failure' => 'Vous n\'avez pas assez de place',
                'products' => $products
            ]);
        } else if ($user->getMoney() < $productsBuy->getPrice()) {
            return view('market', [
                'failure' => 'Vous n\'avez pas assez d\'argent',
                'products' => $products
            ]);
        } else {
            $userInventory = $user->getInventorySize();
            $userInventory--;
            $user->setInventorySize($userInventory)->save();
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

            return view('market', [
                'success' => 'Vous avez bien acheté',
                'products' => $products
            ]);
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
        $products = Products::get();
        $inventory = Inventory::findOneBy(['user_id' => $user, 'name' => $productsBuy->name]);

        if ($inventory === null) {
            return view('market', [
                'failure' => 'Vous ne posséder pas ce produit',
                'products' => $products
            ]);
        } else if ($inventory->quantity === 0) {
            return view('market', [
                'failure' => 'Vous ne posséder pas ce produit',
                'products' => $products
            ]);
        } else {
            $userInventorySize = $user->getInventorySize;
            $userInventorySize++;
            $user->setInventorySize($userInventorySize)->save();
            $user->addMoney($productsBuy->getPrice())->save();

            Inventory::findOneByUserId($user)
                ->findOneByName($productsBuy->name)
                ->setQuantity($inventory->quantity - 1)
                ->save();

            return view('market', [
                'success' => 'Vous avez bien vendu le produit',
                'products' => $products
            ]);
        }
    }

}

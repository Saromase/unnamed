<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        $userStats = $user->getUserStats();
        $productsBuy = Products::findOneById($id);
        $products = Products::get();

        if ($userStats->inventory == 0) {
            return view('market', [
                'failure' => 'Vous n\'avez pas assez de place',
                'products' => $products
            ]);
        } else if ($userStats->getMoney() < $productsBuy->getPrice()) {
            return view('market', [
                'failure' => 'Vous n\'avez pas assez d\'argent',
                'products' => $products
            ]);
        } else {
            $userStatsInventory = $userStats->getInventory();
            $userStatsInventory--;
            $userStats->setInventory($userStatsInventory)->save();
            $userStats->subMoney($productsBuy->getPrice())->save();

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

}

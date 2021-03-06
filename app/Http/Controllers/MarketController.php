<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\View\Factory as ViewFactory;
use App\Models\Products;
use App\Models\Inventory;
use App\Models\Factory;
use App\Models\User;
use App\Models\UserFactory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MarketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return ViewFactory|View
     */
    public function displayMarketHome()
    {
        return view('market.home', [
            'user' => User::get()->first()
        ]);
    }

    /**
     * @return ViewFactory|View
     */
    public function displayProductsTierOne()
    {
        return view('market.tier_one', [
            'products' => Products::findByTier(1)
        ]);
    }

    /**
     * @return ViewFactory|View
     */
    public function displayProductsTierTwo()
    {
        return view('market.tier_two', [
            'products' => Products::findByTier(2)
        ]);
    }

    /**
     * @return ViewFactory|View
     */
    public function displayFactory()
    {
        $factories = Factory::get();
        $datas = [];

        foreach ($factories as $factory) {
            $currentFactory = UserFactory::findOneBy(['user_id' => $this->getUser()->getId(), 'factory_id' => $factory->getId()]);
            array_push($datas, [
                'name' => $factory->getName(),
                'level' => null === $currentFactory ? 0 : $currentFactory->getLevel(),
                'price' => $factory->getFactoryPrice($this->getUser())
            ]);
        }

        return view('market.factory', [
            'userFactoryDatas' => $datas
        ]);
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function buyProduct($id)
    {
        $user = $this->getUser();
        $productsBuy = Products::findOneById($id);

        if ($user->getInventorySize() == 0) {
            return redirect('market')->with('warning', 'Vous ne pouvez pas acheter ce produit, il vous faut plus de place');
        } else if ($user->getMoney() < $productsBuy->getPrice()) {
            return redirect('market')->with('warning', 'Vous ne pouvez pas acheter ce produit, il vous faut plus d\'argent');
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

            return redirect('market')->with('success', 'Vous avez bien acheter ce produit');
        }

    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function sellProduct($id)
    {
        $user = $this->getUser();
        $productsBuy = Products::findOneById($id);
        $inventory = Inventory::findOneBy(['user_id' => $user, 'name' => $productsBuy->name]);

        if ($inventory === null) {
            return redirect('market')->with('warning', 'Vous ne posséder pas ce produit');
        } else if ($inventory->quantity === 0) {
            return redirect('market')->with('warning', 'Vous ne posséder pas ce produit');
        } else {
            $user->addInventorySize(1)->addMoney($productsBuy->price)->save();

            Inventory::findOneByUserId($user)
                ->findOneByName($productsBuy->name)
                ->setQuantity($inventory->quantity - 1)
                ->save();

            return redirect('market')->with('success', 'Vous avez bien vendu ce produit');
        }
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function sellAll($id)
    {
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
            return redirect('market')->with('warning', 'Vous ne posséder pas ce produit');
        } else if ($inventory->quantity === 0) { // Si la quantity est egale à 0
            return redirect('market')->with('warning', 'Vous ne posséder pas ce produit');
        } else {
            // Je récupere le nombre d'objet que l'utilisateur veux vendre
            $quantityToSell = $inventory->quantity;

            $user->addInventorySize($quantityToSell)->addMoney($productsBuy->price * $quantityToSell)->save();
            Inventory::findOneByUserId($user)
                ->findOneByName($productsBuy->name)
                ->setQuantity(0)
                ->save();

            return redirect('market')->with('success', 'Vous avez tout vendu, et ainsi obtenu ' . $productsBuy->price * $quantityToSell);
        }
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function buyMax($id)
    {
        // Je récupere l'ensemble des données utilisateur
        $user = $this->getUser();
        // Je recherche le produit qu'il souhaite vendre
        $productsBuy = Products::findOneById($id);
        // Je récupere la taille disponible dans l'inventaire
        $inventorySize = $user->getInventorySize();
        if ($inventorySize === 0) {
            return redirect('market')->with('warning', 'Vous ne pouvez pas acheter ce produit, vous n\'avez pas assez de place');
        }

        $numberMaxBuy = $user->getMoney() / $productsBuy->price;
        if ($numberMaxBuy < 1) {
            return redirect('market')->with('warning', 'Vous ne pouvez pas acheter ce produit, vous n\'avez pas assez d\'argent');
        } else {
            $numberMaxBuy = floor($numberMaxBuy);
            if ($numberMaxBuy > $inventorySize) {
                $numberMaxBuy = $inventorySize;
            }
            $user->subMoney($numberMaxBuy * $productsBuy->price)->subInventorySize($numberMaxBuy)->save();

            if (null === $inventory = Inventory::findOneBy(['user_id' => $user, 'name' => $productsBuy->name])) {
                Inventory::insert([
                    'name' => $productsBuy->getName(),
                    'user_id' => $user->getId(),
                    'buy_price' => $productsBuy->getPrice(),
                    'quantity' => $numberMaxBuy,
                    'created_at' => new Carbon(),
                    'updated_at' => new Carbon()
                ]);
                return redirect('market')->with('success', "Vous avez acheter $numberMaxBuy pour " . $numberMaxBuy * $productsBuy->price);
            } else {
                $inventory->addQuantity($numberMaxBuy)->save();
                return redirect('market')->with('success', "Vous avez acheter $numberMaxBuy pour " . $numberMaxBuy * $productsBuy->price);
            }
        }


        \Log::info($inventorySize);
    }

}

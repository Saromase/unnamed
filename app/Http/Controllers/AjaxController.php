<?php
/**
 * Created by PhpStorm.
 * User: Maps_red
 * Date: 14/10/2017
 * Time: 22:43
 */

namespace App\Http\Controllers;

use App\Models\Storage;
use App\Models\Products;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function addStorageUpgrade(Request $request)
    {
        if ($request->isMethod("POST")) {
            $playerStorage = $this->getUser()->getStorage();

            $futureStorageId = $playerStorage->getId() + 1;
            $futureStorage = Storage::findOneById($futureStorageId);

            $inventorySize = $futureStorage->getLength() - $playerStorage->getLength();
            $upgradePrice = $futureStorage->getPrice();

            // On récupère la money de l'utilisateur
            $playerMoney = $this->getUser()->getMoney();
            if ($playerMoney >= $upgradePrice) {
                $this->getUser()
                    ->setStorageId($futureStorageId)
                    ->subMoney($upgradePrice)
                    ->addInventorySize($inventorySize)
                    ->save();

                return new JsonResponse([
                    "status" => 'success',
                    "message" => 'Amélioration réussie.',
                    "storage" => $futureStorage,
                    "playerMoney" => $this->getUser()->getMoney(),
                    "upgradePrice" => Storage::findOneById($futureStorageId + 1)->getPrice()
                ]);

            } elseif ($playerMoney < $upgradePrice) {
                return new JsonResponse(['warning', 'Vous n\'avez pas assez d\'argent !']);
            }

            return new JsonResponse(['warning', 'Erreur !!!']);
        }

        return new JsonResponse(null, JsonResponse::HTTP_METHOD_NOT_ALLOWED);
    }
    
    public function refreshProductsPrice(Request $request){
        \Log::info('toto');
        if ($request->isMethod("POST")){
            $products = Products::get();
            foreach ($products as $datas){
                $oldPrice = $datas->median_price;
                $demand = $datas->supply_demand;
                $newPrice = $oldPrice * ($demand + 100) / 100;
                $datas->setPrice($newPrice)
                    ->genSupply()
                    ->save();
            }
             $products = Products::get();
            return new JsonResponse([
                "status" => 'success',
                "message" => 'Les prix ont était mis à jour',
                "products" => $products
            ]);
        }
        return new JsonResponse(null, JsonResponse::HTTP_METHOD_NOT_ALLOWED);
    }
}
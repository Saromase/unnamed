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
use App\Models\Factory;
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

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function refreshProductsPrice(Request $request)
    {
        if ($request->isMethod("POST")) {
            $products = Products::get();

            foreach ($products as $product) {
                $medianPrice = $product->getMedianPrice();
                $supplyDemand = $product->getSupplyDemand();
                $newPrice = $medianPrice * ($supplyDemand + 100) / 100;
                $product->setPrice($newPrice)->genSupply()->save();
            }

            return new JsonResponse([
                "status" => 'success',
                "message" => 'Les prix ont été mis à jour',
                "products" => Products::get()
            ]);
        }

        return new JsonResponse(null, JsonResponse::HTTP_METHOD_NOT_ALLOWED);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function refreshChartDonut(Request $request)
    {
        if ($request->isMethod("POST")) {
            return new JsonResponse([
                "status" => 'success',
                "products" => Products::get()
            ]);
        }

        return new JsonResponse(null, JsonResponse::HTTP_METHOD_NOT_ALLOWED);
    }

    public function addFactory($number)
    {
        $user = $this->getUser();
        $factory = Factory::findOneById($number);
        $factoryPrice = Factory::getFactoryPrice();
        if ($user->money >= $factoryPrice) {
            echo 'toto';
        }
    }
}

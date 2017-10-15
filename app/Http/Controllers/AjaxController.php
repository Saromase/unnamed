<?php
/**
 * Created by PhpStorm.
 * User: Maps_red
 * Date: 14/10/2017
 * Time: 22:43
 */

namespace App\Http\Controllers;

use App\Models\Storage;
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

                return new JsonResponse(['success', 'Amélioration réussie.', $futureStorage->getLength()]);
            }elseif($playerMoney < $upgradePrice) {
                return new JsonResponse(['warning', 'Vous n\'avez pas assez d\'argent !']);
            }

            return new JsonResponse(['warning', 'Erreur !!!']);
        }

        return new JsonResponse(null, JsonResponse::HTTP_METHOD_NOT_ALLOWED);
    }
}
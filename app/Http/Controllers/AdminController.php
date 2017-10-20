<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
    * @return Factory|View
    */
    public function displayHomeAdminPanel()
    {
        return view('adminPanel.home', [
            'user' => User::get()->first()
        ]);
    }

    /**
    * @return Factory|View
    */
    public function displayProductsAdminPanel()
    {
        $products = Products::get();
        $dateUpdate = $products->first()->updated_at;
        if ($dateUpdate == null){
          $hourUpdate = [ 1 => 'never'];
        } else {
          $hourUpdate = explode(" ", $dateUpdate);
        }


        return view('adminPanel.products', [
            'products' => $products,
            'lastUpdate' => $hourUpdate[1]
        ]);
    }

    /**
    * @return Factory|View
    */
    public function displayUsersAdminPanel()
    {
        $users = User::get();
        $lastUserName = $users->last()->name;

        return view('adminPanel.users', [
            'users' => $users,
            'lastUserName' => $lastUserName
        ]);
    }
}

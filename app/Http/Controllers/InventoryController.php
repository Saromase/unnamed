<?php

namespace App\Http\Controllers;

class InventoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getUseazazrInventory($id)
    {
        return $this->where('id', '=', "$id")->get();
    }
}

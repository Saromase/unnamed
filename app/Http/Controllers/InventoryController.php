<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function getUseazazrInventory($id){
        return $this->where('id', '=', "$id")->get();
    }
}

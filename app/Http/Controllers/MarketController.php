<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Products;

class MarketController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }

  public function displayProducts() {
    $products = Products::get();
    return view('market', [
      'products' => $products
    ]);
  }
}

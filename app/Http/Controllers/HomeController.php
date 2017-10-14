<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Models\Products;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $planete = Products::get();
        return view('home', [
            'planet' => $planete,
            'user' => $this->getUser()
        ]);
    }
}

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
        return view('home', [
          'planet' => Products::get(),
          'user' => $this->getUser()
        ]);
    }
}

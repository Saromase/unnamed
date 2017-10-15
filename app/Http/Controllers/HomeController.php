<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Models\Products;

use Illuminate\Http\Request;
use App\Http\Requests;
use Charts;

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

        // array pour remplir la Chart
        $arrLabelsChart = [];
        $arrValuesChart = [];

        // remplie l'array LabelsChart
        $productsName = Products::select('name')->get();
        foreach ($productsName as $productName) {
          array_push($arrLabelsChart, $productName->name);
        }

        // remplie l'array ValuesChart
        $productsQuantity = Products::select('quantity')->get();
        foreach ($productsQuantity as $productQuantity) {
          array_push($arrValuesChart, $productQuantity->quantity);
        }

        // Création de la chart
        $chart = Charts::create('donut', 'highcharts')
            ->title('Ma planète')
            ->labels($arrLabelsChart)
            ->values($arrValuesChart)
            ->dimensions(1000, 500)
            ->responsive(true);

        return view('home', [
          'chart' => $chart,
          'planet' => $planete,
          'user' => $this->getUser()
        ]);
    }
}

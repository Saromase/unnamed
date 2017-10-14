<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Products;

class InsertProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:products:insert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert Prducts on Products base';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $temp = [];
        $final = [];
        $total = 0;

        $name = ['Eau', 'Pierre', 'Gaz Naturel', 'Petrole', 'Aluminium', 'Or', 'Cuivre', 'Fer', 'Sable', 'Charbon', 'Bois'];
        
        for ($i = 0; $i < count($name); $i++){
            $quantity = rand(0,15000);
            $regeneration = $quantity / 100;
            $total += $quantity;
            array_push($temp, [
               'name' => $name[$i],
                'quantity' => $quantity,
                'regeneration' => round($regeneration),
            ]);
        }
        
        for ($j = 0; $j < count($name); $j++){
            $quantity = $temp[$j]['quantity'];
            $regeneration = $temp[$j]['regeneration'];
            $percentage = ($quantity / $total) * 100;
            $price = $total / $quantity * 25;
            array_push($final, [
               'name' => $name[$j],
                'quantity' => $quantity,
                'regeneration' => round($regeneration),
                'percentage' => round($percentage),
                'price' => round($price),
                'supply_demand' => rand(-100, 100),
            ]);
        }
        
        Products::insert($final);
    }
}
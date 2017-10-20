<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $temp = [];
        $final = [];
        $total = 0;

        $name = ['eau', 'pierre', 'gaz', 'pétrole', 'bauxite', 'minerai d\'or', 'minerai de cuivre', 'minerai de fer', 'sable', 'charbon', 'bois', 'lingot de fer', 'lingot de cuivre', 'lingot d\'or', 'lingot d\'aluminium', 'silex', 'carbone compresser', 'anneau de fer', 'anneau de cuivre', 'anneau d\'aluminium', 'anneau d\'or', 'diamant', 'planche', 'clous', 'diamant taillé', 'meuble', 'armature', 'anneau d\'or serti d\'un diamant', 'verre', 'vitrine en verre'];
        $color = ['#00c2d0', '#4e4e55', '#e4e4e4', '#1f1f1f', '#bf675a', '#ffd600', '#df9169', '#897474', '#f3ad48', '#445055', '#b77400'];

        for ($i = 0; $i < count($name); $i++) {
            $quantity = rand(0, 15000);
            $regeneration = $quantity / 100;
            $total += $quantity;
            array_push($temp, [
                'name' => $name[$i],
                'quantity' => $quantity,
                'regeneration' => round($regeneration),
            ]);
        }

        for ($j = 0; $j < count($name); $j++) {
            $quantity = $temp[$j]['quantity'];
            $regeneration = $temp[$j]['regeneration'];
            $percentage = ($quantity / $total) * 100;
            $price = $total / $quantity * 25;
            array_push($final, [
                'name' => $name[$j],
                'quantity' => $quantity,
                'regeneration' => round($regeneration),
                'percentage' => round($percentage),
                'median_price' => round($price),
                'price' => round($price),
                'supply_demand' => rand(-50, 50),
                'color' => $color[$j],
                'tier' => 1
            ]);
        }

        DB::table('products')->insert($final);
    }
}

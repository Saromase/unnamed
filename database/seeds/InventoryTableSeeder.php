<?php

use Illuminate\Database\Seeder;

class InventoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('user_inventory')->insert([
            [
                'name' => 'Eau',
                'buy_price' => 5,
                'quantity' => 5,
                'user_id' => 1,
                'created_at' => null,
                'updated_at' => null
            ]
        ]);

        echo "Vous avez bien ajouté les données dans la table \n";
    }
}

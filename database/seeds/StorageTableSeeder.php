<?php

use Illuminate\Database\Seeder;

class StorageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('storage')->insert([
            [
                'name' => 'Chambre',
                'length' => '5',
                'price' => '0'
            ],
            [
                'name' => 'Garage',
                'length' => '10',
                'price' => '500'
            ],
            [
                'name' => 'Abris de jardin',
                'length' => '20',
                'price' => '2500'
            ],
            [
                'name' => 'Container',
                'length' => '30',
                'price' => '5000'
            ],
            [
                'name' => 'Petit Entrepot',
                'length' => '50',
                'price' => '25000'
            ],
            [
                'name' => 'Moyen Entrepot',
                'length' => '75',
                'price' => '100000'
            ],
            [
                'name' => 'Grand Entrepot',
                'length' => '150',
                'price' => '500000'
            ],
            [
                'name' => 'Hangar',
                'length' => '250',
                'price' => '1000000'
            ],
        ]);

        echo "Vous avez bien ajouté les données dans la table \n";
    }
}

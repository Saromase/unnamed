<?php

use Illuminate\Database\Seeder;

class FactoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Fonderie', 'Four', 'Raffinerie', 'Scierie', 'Cimenterie', 'Compacteur'];
        $final = [];
        foreach ($names as $name) {
            array_push($final, ['name' => $name]);
        }

        DB::table('factory')->insert($final);
    }
}

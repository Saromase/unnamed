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
      $name = ['Fonderie', 'Four', 'Raffinerie', 'Scierie', 'Cimenterie', 'Compacteur'];
      $final = [];
      foreach ($name as $datas) {
        array_push($final, ['name' => $datas]);
      }
      DB::table('factory')->insert($final);
    }
}

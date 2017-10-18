<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->call([
            StorageTableSeeder::class,
            ProductsTableSeeder::class,
            UserTableSeeder::class,
            InventoryTableSeeder::class,
            FactoryTableSeeder::class
        ]);
    }

}

<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.fr',
            'password' => bcrypt('discord'),
            'storage_id' => 1,
            'money' => 100,
            'inventory_size' => 0,
            'factory_number' => 0
        ]);

        echo "L\'utilisateur Admin à bien était ajoutée \n Adresse email : admin@admin.fr \n Nom d\'utilisateur : admin \n Mot de passe : discord \n";
    }
}

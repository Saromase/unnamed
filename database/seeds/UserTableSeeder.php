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
            'inventory_size' => 0
        ]);

        echo 'L\'utilisateur Admin à bien était ajoutée 
            Adresse email : admin@admin.fr
            Nom d\'utilisateur : admin
            Mot de passe : discord
        ';
    }
}

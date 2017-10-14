<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;


class InsertUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:user:insert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert One User Test ';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {   
        User::insert([
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

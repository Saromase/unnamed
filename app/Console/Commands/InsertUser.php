<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\UserStats;
use App\Models\Inventory;


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
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.fr',
            'password' => bcrypt('discord'),
        ]);
        UserStats::insert([
            'user_id' => 1,
            'storage_id' => 1,
            'life' => 100,
            'money' => 10,
            'inventory' => 5,
        ]);
        echo 'L\'utilisateur Admin à bien était ajoutée 
        Adresse email : admin@admin.fr
        Nom d\'utilisateur : admin
        Mot de passe : discord 
        ';
    }
}

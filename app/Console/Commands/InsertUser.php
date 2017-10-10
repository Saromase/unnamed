<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\UserStats;
use App\Inventory;


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
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {   
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.fr',
            'password' => bcrypt('discord'),
        ]);
        Inventory::create();
        UserStats::insert([
            'user_id' => 1,
            'user_storage' => 1,
            'user_inventory' => 1,
            'life' => 100,
            'money' => 10,
            'max_inventory' => 5,
        ]);
        echo 'L\'utilisateur Admin à bien était ajoutée 
        Adresse email : admin@admin.fr
        Nom d\'utilisateur : admin
        Mot de passe : discord 
        ';
    }
}

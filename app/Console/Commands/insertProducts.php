<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Products;

class insertProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:products:insert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert Products on Products base';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Products::insert([
            [
                'name' => 'water',
                'price' => '50'
            ],
            [
                'name' => 'wood',
                'price' => '10'
            ],
            [
                'name' => 'rock',
                'price' => '75'
            ]

        ]);

        echo "Vous avez bien ajouté les données dans la table \n";
    }
}
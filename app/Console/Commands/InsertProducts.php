<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Products;

class InsertProducts extends Command
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
    protected $description = 'Insert Prducts on Products base';

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
                'name' => 'Eau',
                'price' => '5',
                'min_price' => '0',
                'max_price' => '10'
            ],
            [
                'name' => 'Pierre',
                'price' => '15',
                'min_price' => '10',
                'max_price' => '20'
            ],
            [
                'name' => 'Gaz naturel',
                'price' => '5',
                'min_price' => '0',
                'max_price' => '10'
            ],
            [
                'name' => 'Petrole',
                'price' => '5',
                'min_price' => '0',
                'max_price' => '10'
            ],
            [
                'name' => 'Aluminium',
                'price' => '5',
                'min_price' => '0',
                'max_price' => '10'
            ],
            [
                'name' => 'Or',
                'price' => '5',
                'min_price' => '0',
                'max_price' => '10'
            ],
            [
                'name' => 'Cuivre',
                'price' => '5',
                'min_price' => '0',
                'max_price' => '10'
            ],
            [
                'name' => 'Fer',
                'price' => '5',
                'min_price' => '0',
                'max_price' => '10'
            ],
            [
                'name' => 'Sable',
                'price' => '5',
                'min_price' => '0',
                'max_price' => '10'
            ],
            [
                'name' => 'Charbon',
                'price' => '5',
                'min_price' => '0',
                'max_price' => '10'
            ],
            [
                'name' => 'Bois',
                'price' => '5',
                'min_price' => '0',
                'max_price' => '10'
            ],

        ]);

        echo "Vous avez bien ajouté les données dans la table \n";
    }
}
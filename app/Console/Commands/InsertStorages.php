<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Stockage;

class InsertStorages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:stockage:insert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'add stockage datas';

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
        Stockage::insert([
            [
                'name' => 'Garage',
                'length' => '5',
                'price' => '0'
            ],
            [
                'name' => 'Abris de jardin',
                'length' => '10',
                'price' => '500'
            ],
            [
                'name' => 'Container',
                'length' => '20',
                'price' => '5000'
            ],
            [
                'name' => 'Petit Entrepot',
                'length' => '50',
                'price' => '25000'
            ],
            [
                'name' => 'Moyen Entrepot',
                'length' => '150',
                'price' => '100000'
            ],
            [
                'name' => 'Grand Entrepot',
                'length' => '250',
                'price' => '500000'
            ],
            [
                'name' => 'Hangar',
                'length' => '500',
                'price' => '1000000'
            ],
        ]);

        echo "Vous avez bien ajouté les données dans la table \n";
    }
}

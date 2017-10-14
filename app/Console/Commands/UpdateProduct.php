<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Products;

class UpdateProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:products:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Met à jour les prix des produits';

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
        $final = [];
        $products = Products::get();
        foreach ($products as $datas){
            $oldPrice = $datas->median_price;
            $demand = $datas->supply_demand;
            $newPrice = $oldPrice * ($demand + 100) / 100;
            echo $datas->name . " : " . $newPrice . "\n";
            echo $datas->getMedianPrice() . "\n";
            $datas->setPrice($newPrice)
                ->genSupply()
                ->save();
        }
    }
}

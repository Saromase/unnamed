<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Inventory;
use App\Models\UserStats;
use App\Models\User;

class InsertInventory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:inventory:insert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert Inventory on inventory base';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Inventory::insert([
            [
                'name' => 'Eau',
                'buy_price' => 5,
                'quantity' => 5,
                'user_id' => 1,
                'created_at' => null,
                'updated_at' => null
            ]
        ]);


        echo "Vous avez bien ajouté les données dans la table \n";
    }
}

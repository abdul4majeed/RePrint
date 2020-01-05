<?php

use App\ShopServices;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShopServices::create([
            'shop_id' => 1,
            'service_name' => 'Print Document',
            'service_price' => 10
        ]);
    }

    


}

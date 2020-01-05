<?php

use App\Shop;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shop::create([
            'shop_name' => 'Alpha',
            'shop_owner_name' => 'Alpha',
            'shop_phone' => 'Alpha',
            'shop_email' => 'Alpha',
            'shop_address' => 'Alpha',
            'shop_city' => 'Alpha',
        ]);
    }
}

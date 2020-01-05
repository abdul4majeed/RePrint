<?php

use App\ShopSubServices;
use Illuminate\Database\Seeder;

class SubServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShopSubServices::create([
            'services_id' => 1,
            'sub_service_name' => 'Binding', 
            'sub_service_price' => 100
        ]);
    }
}

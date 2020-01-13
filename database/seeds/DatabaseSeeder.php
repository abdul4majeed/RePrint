<?php

use App\ShopServices;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(RoleSeeder::class);
        // $this->call(ShopSeeder::class);
        // $this->call(ServiceSeeder::class);
        // $this->call(SubServiceSeeder::class);
        // $this->call(PaymentTypeSeeder::class);
        $this->call(PaymentStatusSeeder::class);
        $this->call(OrderStatusSeeder::class);
    }
}

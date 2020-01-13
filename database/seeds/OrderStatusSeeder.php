<?php

use App\OrderStatus;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order_status = ['Completed','Delivery','Progress','Pending'];
        while($o_s = array_pop($order_status))
        {
            OrderStatus::create([
                'status' => $o_s,
            ]);
        }
    }
}

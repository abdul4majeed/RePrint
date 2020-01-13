<?php

use App\PaymentStatus;
use Illuminate\Database\Seeder;

class PaymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payment_status = ['Paid','Not Paid'];
        while($p_s = array_pop($payment_status))
        {
            PaymentStatus::create([
                'status' => $p_s,
            ]);
        }
    }
}

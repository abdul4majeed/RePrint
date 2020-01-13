<?php

use App\PaymentType;
use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payment_types = ['Cash on Deleiver','Tap','MyFatoorah'];
        while($payment_type = array_pop($payment_types))
        {
            PaymentType::create([
                'payment_name' => $payment_type,
            ]);
        }
    }
}

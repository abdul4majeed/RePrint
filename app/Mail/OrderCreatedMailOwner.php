<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCreatedMailOwner extends Mailable
{
    use Queueable, SerializesModels;
    private $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('abdul4majeed@example.com')
        ->view('mail.ownerorder')->with([
            'firstName' => $this->data['firstName'],
            'service_name'=>$this->data['service_name'],
            'service_price'=>$this->data['service_price'],
            'sub_service_name'=>$this->data['sub_service_name'],
            'sub_service_price'=>$this->data['sub_service_price'],
            'payment'=>$this->data['payment'],
            'totalPrice'=>$this->data['totalPrice'],
            'shop_name'=>$this->data['shop_name'],
            'shop_phone'=>$this->data['shop_phone'],
            'shop_email'=>$this->data['shop_email'],
            'shop_address'=>$this->data['shop_address'],
            'shop_city'=>$this->data['shop_city'],
            'order_id'=>$this->data['order_id']
            ]);
    }
}

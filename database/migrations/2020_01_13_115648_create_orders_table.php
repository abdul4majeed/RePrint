<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('shop_id');
            $table->integer('service_id');
            $table->integer('sub_service_id');
            $table->integer('payment_type');
            $table->float('bill');
            $table->float('user_id');
            $table->integer('shop_admin_notification')->default(0);
            $table->integer('admin_notification')->default(0);
            $table->integer('order_status')->default(0);
            $table->integer('payment_status')->default(0);
            $table->integer('payment_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

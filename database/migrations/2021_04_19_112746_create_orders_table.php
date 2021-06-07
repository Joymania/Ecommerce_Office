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
            $table->id();
            $table->string('order_code')->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')
                  ->onUpdate('cascade')->onDelete('set null');
            $table->string('biling_fname');
            $table->string('biling_lname')->nullable();
            $table->string('biling_address');
            $table->string('biling_city');
            $table->string('biling_phone');
            $table->string('biling_email')->nullable();
            $table->string('biling_notes')->nullable();
            $table->tinyInteger('status')->default('0');
            $table->string('payment');
            $table->string('subtotal');
            $table->string('transaction')->nullable();
            $table->string('bkash_mobile')->nullable();
            $table->integer('shipping_method_id')->nullable();
            $table->date('date')->nullable();

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

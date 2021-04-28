<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->integer('tag_id')->nullable();
            $table->integer('review_id')->nullable();
            $table->string('name');
            $table->double('price');
            $table->text('short_desc')->nullable();
            $table->text('long_desc')->nullable();
            $table->string('image')->nullable();
            $table->integer("stock");
            $table->integer('stock_warning');
            $table->integer("sub_category_id")->nullable();
            $table->integer("buying_price")->nullable();

            $table->double('promo_price')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->float('avg_rating')->nullable();

            $table->integer('cart_shopping_id')->nullable();
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
        Schema::dropIfExists('products');
    }
}

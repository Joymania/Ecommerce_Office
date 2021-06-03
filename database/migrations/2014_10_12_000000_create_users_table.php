<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('lname')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->tinyInteger('is_verified')->default(0);
            $table->string('password');
            $table->tinyInteger('status')->default(0);
            $table->string('image')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

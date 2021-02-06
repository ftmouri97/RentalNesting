<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {
            $table->id();
           
            $table->bigInteger('renter_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('address')->nullable();
            $table->Integer('holding_no')->nullable();
            $table->Integer('amount')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
            $table->foreign('renter_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentConfirmationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent_confirmations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('renter_id')->unsigned();
            $table->bigInteger('owner_id')->unsigned();
            $table->bigInteger('apartment_id')->unsigned();
            $table->string('advance_payment',100);
            $table->integer('status');
            $table->timestamps();

            $table->foreign('renter_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('apartment_id')->references('id')->on('apartment_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rent_confirmations');
    }
}

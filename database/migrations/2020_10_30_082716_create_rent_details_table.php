<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('renter_id')->unsigned();
            $table->bigInteger('apartment_id')->unsigned();
            $table->bigInteger('owner_id')->unsigned();
            $table->string('month', 100)->nullable();
            $table->integer('rent_status')->nullable();
            $table->integer('service_charge_status')->nullable();
            $table->integer('gas_bill_status')->nullable();
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
        Schema::dropIfExists('rent_details');
    }
}

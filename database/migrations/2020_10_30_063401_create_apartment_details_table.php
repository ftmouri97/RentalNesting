<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartment_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('owner_id')->unsigned();
            $table->string('district', 50);
            $table->string('zone', 50);
            $table->string('address', 150);
            $table->integer('total_bed');
            $table->integer('total_bath');
            $table->string('apartment_size',100);
            $table->text('apartment_description');
            $table->string('flat_name',100);
            $table->string('floor_no',100);
            $table->string('apartment_rent',100);
            $table->integer('active_status');
            $table->integer('commission_status');
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartment_details');
    }
}

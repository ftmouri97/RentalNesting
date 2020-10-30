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
            $table->bigInteger('user_id')->unsigned();
            $table->string('district', 50);
            $table->string('zone', 50);
            $table->string('address', 150);
            $table->integer('total_bed');
            $table->integer('total_bath');
            $table->string('apartment_size',100);
            $table->string('appartment_description',100);
            $table->string('flat_name',100);
            $table->string('flor_no',100);
            $table->string('appartment_rent',100);
            $table->boolean('active_status');
            $table->boolean('commision_status');
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
        Schema::dropIfExists('apartment_details');
    }
}

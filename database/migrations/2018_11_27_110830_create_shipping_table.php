<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping', function (Blueprint $table) {
             $table->increments('id');
            $table->string('shipping_name');
            $table->string('mobile');
            $table->text('address');
            $table->string('city');
            $table->string('country');
            $table->string('zip_code');
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
        Schema::dropIfExists('shipping');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('td_vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('manuId');
            $table->unsignedInteger('modelId');
            $table->unsignedInteger('carId');
            $table->string('carType', 3);
            $table->string('carName', 150);
            $table->string('firstCountry', 5);
            $table->string('slug', 150);
            $table->dateTime('synchronizedArticlesAt')->nullable();
            $table->index('manuId');
            $table->index('modelId');
            $table->index('carId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('td_vehicles');
    }
}

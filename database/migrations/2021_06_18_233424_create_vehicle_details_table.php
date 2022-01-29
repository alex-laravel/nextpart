<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('td_vehicle_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('carId');
            $table->unsignedInteger('ccmTech')->nullable();
            $table->string('constructionType', 150)->nullable();
            $table->unsignedSmallInteger('cylinder')->nullable();
            $table->unsignedInteger('cylinderCapacityCcm')->nullable();
            $table->unsignedInteger('cylinderCapacityLiter')->nullable();
            $table->string('fuelType', 150)->nullable();
            $table->string('fuelTypeProcess', 150)->nullable();
            $table->string('impulsionType', 150)->nullable();
            $table->unsignedInteger('manuId')->nullable();
            $table->string('manuName', 150)->nullable();
            $table->unsignedInteger('modId')->nullable();
            $table->string('modelName', 150)->nullable();
            $table->string('motorType', 150)->nullable();
            $table->unsignedSmallInteger('powerHpFrom')->nullable();
            $table->unsignedSmallInteger('powerHpTo')->nullable();
            $table->unsignedSmallInteger('powerKwFrom')->nullable();
            $table->unsignedSmallInteger('powerKwTo')->nullable();
            $table->string('typeName', 150)->nullable();
            $table->unsignedInteger('typeNumber')->nullable();
            $table->unsignedSmallInteger('valves')->nullable();
            $table->unsignedInteger('yearOfConstrFrom')->nullable();
            $table->unsignedInteger('yearOfConstrTo')->nullable();
            $table->string('vehicleDocId', 150)->nullable();
            $table->string('assetThumbnailName', 36)->unique()->nullable();
            $table->string('assetImageName', 36)->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('td_vehicle_details');
    }
}

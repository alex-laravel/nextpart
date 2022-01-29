<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManufacturerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('td_manufacturers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('manuId');
            $table->string('manuName', 150);
            $table->string('slug', 150);
            $table->boolean('favorFlag');
            $table->boolean('isPopular');
            $table->boolean('isVisible');
            $table->smallInteger('modelsTotal')->default(0);
            $table->smallInteger('vehiclesTotal')->default(0);
            $table->index('manuId');
            $table->index('manuName');
            $table->index('slug');
            $table->index('favorFlag');
            $table->index('isPopular');
            $table->index('isVisible');
            $table->index('modelsTotal');
            $table->index('vehiclesTotal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('td_manufacturers');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('td_model_series', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('manuId');
            $table->unsignedInteger('modelId');
            $table->string('modelname', 150);
            $table->string('slug', 150);
            $table->unsignedInteger('yearOfConstrFrom')->nullable();
            $table->unsignedInteger('yearOfConstrTo')->nullable();
            $table->boolean('favorFlag');
            $table->boolean('isPopular');
            $table->boolean('isVisible');
            $table->smallInteger('vehiclesTotal')->default(0);
            $table->index('manuId');
            $table->index('modelId');
            $table->index('modelname');
            $table->index('slug');
            $table->index('favorFlag');
            $table->index('isPopular');
            $table->index('isVisible');
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
        Schema::dropIfExists('td_model_series');
    }
}

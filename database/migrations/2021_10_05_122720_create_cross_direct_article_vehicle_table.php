<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrossDirectArticleVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('td_cross_direct_article_vehicle', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('articleId');
            $table->unsignedBigInteger('articleLinkId');
            $table->unsignedBigInteger('carId');
            $table->index('articleId');
            $table->index('carId');
        });

//ALTER TABLE `td_cross_direct_article_vehicle` ADD INDEX `td_cross_direct_article_vehicle_article_id_index` (`articleId`);
//ALTER TABLE `td_cross_direct_article_vehicle` ADD INDEX `td_cross_direct_article_vehicle_car_id_index` (`carId`);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('td_cross_direct_article_vehicle');
    }
}

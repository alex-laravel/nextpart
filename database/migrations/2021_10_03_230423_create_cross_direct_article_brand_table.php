<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrossDirectArticleBrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('td_cross_direct_article_brand', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('articleId');
            $table->unsignedBigInteger('brandNo');
            $table->string('brandName', 250);
            $table->index('articleId');
            $table->index('brandNo');
        });

//ALTER TABLE `td_cross_direct_article_brand` ADD INDEX `td_cross_direct_article_brand_article_id_index` (`articleId`);
//ALTER TABLE `td_cross_direct_article_brand` ADD INDEX `td_cross_direct_article_brand_brand_no_index` (`brandNo`);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('td_cross_direct_article_brand');
    }
}

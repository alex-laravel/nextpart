<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectArticleAnalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('td_direct_article_analogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('originalArticleId');
            $table->string('originalArticleNo', 250);
            $table->unsignedBigInteger('articleId');
            $table->string('articleNo', 250);
            $table->string('articleSearchNo', 250);
            $table->string('articleName', 250);
            $table->unsignedInteger('articleStateId');
            $table->unsignedBigInteger('brandNo');
            $table->string('brandName', 250);
            $table->unsignedBigInteger('genericArticleId');
            $table->unsignedSmallInteger('numberType');
            $table->index('originalArticleId');
        });

//        ALTER TABLE `td_direct_article_analogs` ADD INDEX `td_direct_article_analogs_original_article_id_index` (`originalArticleId`);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('td_direct_article_analogs');
    }
}

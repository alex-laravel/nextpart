<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('td_direct_articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('articleId');
            $table->unsignedBigInteger('articleLinkId');
            $table->string('articleNo', 250);
            $table->unsignedInteger('articleStateId');
            $table->unsignedBigInteger('carId');
            $table->unsignedBigInteger('brandNo');
            $table->string('brandName', 250);
            $table->string('linkingTargetType', 3);
            $table->unsignedBigInteger('genericArticleId');
            $table->unsignedBigInteger('assemblyGroupNodeId');
            $table->string('genericArticleName', 250);
            $table->unsignedBigInteger('sortNo');
            $table->index('carId');
            $table->index('brandNo');
            $table->index('assemblyGroupNodeId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('td_direct_articles');
    }
}

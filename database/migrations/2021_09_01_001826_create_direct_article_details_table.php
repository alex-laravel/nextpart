<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectArticleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('td_direct_article_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('articleId');
            $table->string('articleName', 450);
            $table->string('articleNo', 250);
            $table->unsignedTinyInteger('articleState');
            $table->string('articleStateName', 150);
            $table->unsignedBigInteger('brandNo');
            $table->string('brandName', 250);
            $table->unsignedBigInteger('genericArticleId');
            $table->boolean('flagAccessories');
            $table->boolean('flagCertificationCompulsory');
            $table->boolean('flagRemanufacturedPart');
            $table->boolean('flagSuitedforSelfService');
            $table->boolean('hasAppendage');
            $table->boolean('hasAxleLink');
            $table->boolean('hasCsGraphics');
            $table->boolean('hasDocuments');
            $table->boolean('hasLessDiscount');
            $table->boolean('hasMarkLink');
            $table->boolean('hasMotorLink');
            $table->boolean('hasOEN');
            $table->boolean('hasPartList');
            $table->boolean('hasPrices');
            $table->boolean('hasSecurityInfo');
            $table->boolean('hasUsage');
            $table->boolean('hasVehicleLink');
            $table->json('articleAttributes');
            $table->json('articleThumbnails');
            $table->json('articleDocuments');
            $table->json('articleInfo');
            $table->json('articlePrices');
            $table->json('eanNumber');
            $table->json('immediateAttributs');
            $table->json('immediateInfo');
            $table->json('mainArticle');
            $table->json('oenNumbers');
            $table->json('usageNumbers2');
            $table->json('replacedByNumber');
            $table->json('replacedNumber');
            $table->timestamps();

            $table->index('articleId');
            $table->index('articleNo');
        });

//    ALTER TABLE `td_direct_article_details` ADD INDEX `td_direct_article_details_article_id_index` (`articleId`);
//    ALTER TABLE `td_direct_article_details` ADD INDEX `td_direct_article_details_article_no_index` (`articleNo`);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('td_direct_article_details');
    }
}

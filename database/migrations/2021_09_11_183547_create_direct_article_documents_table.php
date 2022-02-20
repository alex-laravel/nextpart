<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectArticleDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('td_direct_article_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('articleId');
            $table->string('articleDocId', 150);
            $table->unsignedSmallInteger('articleDocTypeId');
            $table->string('assetDocumentName', 150);
            $table->boolean('isThumbnail');
            $table->timestamps();
            $table->index('articleId');
        });

//        ALTER TABLE `td_direct_article_documents` ADD INDEX `td_direct_article_documents_article_id_index` (`articleId`);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('td_direct_article_documents');
    }
}

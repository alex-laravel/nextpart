<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectArticleRegistryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('td_direct_article_registry', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('articleId');
            $table->dateTime('article_details_last_sync_at')->nullable();
            $table->dateTime('article_documents_last_sync_at')->nullable();
            $table->dateTime('article_analogs_last_sync_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('td_direct_article_registry');
    }
}

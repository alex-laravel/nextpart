<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenericArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('td_generic_articles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('genericArticleId');
            $table->string('assemblyGroup', 250)->nullable();
            $table->string('designation', 250)->nullable();
            $table->string('masterDesignation', 250)->nullable();
            $table->string('usageDesignation', 250)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('td_generic_articles');
    }
}

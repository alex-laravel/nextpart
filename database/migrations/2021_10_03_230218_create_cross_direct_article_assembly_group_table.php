<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrossDirectArticleAssemblyGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('td_cross_direct_article_assembly_group', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('articleId');
            $table->unsignedBigInteger('assemblyGroupNodeId');
            $table->string('linkingTargetType', 3);
            $table->index('articleId');
            $table->index('assemblyGroupNodeId');
        });

//ALTER TABLE `td_cross_direct_article_assembly_group` ADD INDEX `td_cross_direct_article_assembly_group_article_id_index` (`articleId`);
//ALTER TABLE `td_cross_direct_article_assembly_group` ADD INDEX `td_cross_direct_article_assembly_group_assembly_group_id_index` (`assemblyGroupNodeId`);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('td_cross_direct_article_assembly_group');
    }
}

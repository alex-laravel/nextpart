<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistributorProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sh_distributor_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('distributor_storage_id');
            $table->string('product_barcode', 255)->nullable();
            $table->string('product_original_no', 255);
            $table->string('product_local_no', 255)->nullable();
            $table->string('product_local_name', 255)->nullable();
            $table->string('product_band_name', 255)->nullable();
            $table->decimal('price', 13, 4);
            $table->unsignedSmallInteger('quantity')->default(0);
            $table->boolean('has_tecdoc_article')->default(false);
            $table->unsignedBigInteger('tecdoc_article_id')->nullable();
            $table->timestamps();

            $table->foreign('distributor_storage_id')
                ->references('id')
                ->on('sh_distributor_storages')
                ->onDelete('CASCADE');

            $table->index('product_original_no');
            $table->index('quantity');
            $table->index('has_tecdoc_article');
            $table->index('tecdoc_article_id');
        });

//ALTER TABLE `sh_distributor_products` ADD INDEX `sh_distributor_products_product_original_no_index` (`product_original_no`);
//ALTER TABLE `sh_distributor_products` ADD INDEX `sh_distributor_products_quantity_index` (`quantity`);
//ALTER TABLE `sh_distributor_products` ADD INDEX `sh_distributor_products_has_tecdoc_article_index` (`has_tecdoc_article`);
//ALTER TABLE `sh_distributor_products` ADD INDEX `sh_distributor_products_tecdoc_article_id_index` (`tecdoc_article_id`);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sh_distributor_products');
    }
}

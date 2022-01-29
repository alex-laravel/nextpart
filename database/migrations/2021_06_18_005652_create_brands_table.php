<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('td_brands', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedSmallInteger('brandId');
            $table->unsignedInteger('brandLogoID');
            $table->string('brandName', 150);
            $table->string('brandLogoName', 36)->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('td_brands');
    }
}

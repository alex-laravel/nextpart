<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('td_brand_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('brandId');
            $table->string('addressName', 150)->nullable();
            $table->unsignedBigInteger('addressType')->nullable();
            $table->string('city', 150)->nullable();
            $table->string('city2', 150)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('fax', 150)->nullable();
            $table->string('logoDocId', 150)->nullable();
            $table->string('mailbox', 150)->nullable();
            $table->string('name', 150)->nullable();
            $table->string('name2', 150)->nullable();
            $table->string('phone', 150)->nullable();
            $table->string('street', 150)->nullable();
            $table->string('street2', 150)->nullable();
            $table->string('wwwURL', 250)->nullable();
            $table->string('zip', 50)->nullable();
            $table->string('zipCountryCode', 50)->nullable();
            $table->string('zipMailbox', 150)->nullable();
            $table->string('zipSpecial', 150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('td_brand_addresses');
    }
}

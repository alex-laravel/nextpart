<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVersionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('td_version', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('build');
            $table->string('dataVersion', 50);
            $table->string('date', 50);
            $table->unsignedInteger('major');
            $table->unsignedInteger('minor');
            $table->unsignedInteger('revision');
            $table->string('refDataVersion', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('td_version');
    }
}

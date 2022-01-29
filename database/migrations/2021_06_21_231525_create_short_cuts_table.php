<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShortCutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('td_short_cuts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('shortCutId')->unique();
            $table->string('shortCutName', 150);
            $table->string('linkingTargetType', 3);
            $table->boolean('isVisible')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('td_short_cuts');
    }
}

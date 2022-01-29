<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNovaPoshtaRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('de_nova_poshta_regions', function (Blueprint $table) {
            $table->id();
            $table->string('Ref', 36)->unique();
            $table->string('AreasCenter', 36)->unique();
            $table->string('Description', 50);
            $table->string('DescriptionRu', 50);
            $table->string('DescriptionEn', 50);
            $table->boolean('isVisible');
            $table->index('Ref');
            $table->index('isVisible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('de_nova_poshta_regions');
    }
}

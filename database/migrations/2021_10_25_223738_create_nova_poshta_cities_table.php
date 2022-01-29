<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNovaPoshtaCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('de_nova_poshta_cities', function (Blueprint $table) {
            $table->id();
            $table->string('Ref', 36)->unique();
            $table->string('Description', 50);
            $table->string('DescriptionRu', 50);
            $table->string('DescriptionEn', 50);
            $table->boolean('Delivery1');
            $table->boolean('Delivery2');
            $table->boolean('Delivery3');
            $table->boolean('Delivery4');
            $table->boolean('Delivery5');
            $table->boolean('Delivery6');
            $table->boolean('Delivery7');
            $table->boolean('IsBranch');
            $table->boolean('SpecialCashCheck');
            $table->boolean('PreventEntryNewStreetsUser');
            $table->string('CityID', 50);
            $table->string('SettlementType', 36);
            $table->string('SettlementTypeDescription', 50);
            $table->string('SettlementTypeDescriptionRu', 50);
            $table->string('SettlementTypeDescriptionEn', 50);
            $table->string('Area', 36);
            $table->string('AreaDescription', 50);
            $table->string('AreaDescriptionRu', 50);
            $table->string('AreaDescriptionEn', 50);
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
        Schema::dropIfExists('de_nova_poshta_cities');
    }
}

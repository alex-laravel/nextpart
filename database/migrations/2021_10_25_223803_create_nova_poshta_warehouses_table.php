<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNovaPoshtaWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('de_nova_poshta_warehouses', function (Blueprint $table) {
            $table->id();
            $table->string('SiteKey', 50)->nullable();
            $table->string('Description', 250)->nullable();
            $table->string('DescriptionRu', 250)->nullable();
            $table->string('DescriptionEn', 250)->nullable();
            $table->string('ShortAddress', 250)->nullable();
            $table->string('ShortAddressRu', 250)->nullable();
            $table->string('Phone', 50)->nullable();
            $table->string('TypeOfWarehouse', 36)->nullable();
            $table->string('Ref', 36)->nullable();
            $table->string('Number', 50)->nullable();
            $table->string('CityRef', 36)->nullable();
            $table->string('CityDescription', 50)->nullable();
            $table->string('CityDescriptionRu', 50)->nullable();
            $table->string('CityDescriptionEn', 50)->nullable();
            $table->string('SettlementRef', 36)->nullable();
            $table->string('SettlementDescription', 50)->nullable();
            $table->string('SettlementAreaDescription', 50)->nullable();
            $table->string('SettlementRegionsDescription', 50)->nullable();
            $table->string('SettlementTypeDescription', 50)->nullable();
            $table->string('SettlementTypeDescriptionRu', 50)->nullable();
            $table->string('SettlementTypeDescriptionEn', 50)->nullable();
            $table->string('Longitude', 50)->nullable();
            $table->string('Latitude', 50)->nullable();
            $table->string('PostFinance', 50)->nullable();
            $table->string('BicycleParking', 50)->nullable();
            $table->string('PaymentAccess', 50)->nullable();
            $table->string('POSTerminal', 50)->nullable();
            $table->string('InternationalShipping', 50)->nullable();
            $table->string('SelfServiceWorkplacesCount', 50)->nullable();
            $table->string('TotalMaxWeightAllowed', 50)->nullable();
            $table->string('PlaceMaxWeightAllowed', 50)->nullable();
            $table->string('DistrictCode', 50)->nullable();
            $table->string('WarehouseStatus', 50)->nullable();
            $table->string('WarehouseStatusDate', 50)->nullable();
            $table->string('CategoryOfWarehouse', 50)->nullable();
            $table->string('Direct', 50)->nullable();
            $table->string('RegionCity', 50)->nullable();
            $table->string('WarehouseForAgent', 50)->nullable();
            $table->string('MaxDeclaredCost', 50)->nullable();
            $table->string('WorkInMobileAwis', 50)->nullable();
            $table->boolean('isVisible');
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
        Schema::dropIfExists('de_nova_poshta_warehouses');
    }
}

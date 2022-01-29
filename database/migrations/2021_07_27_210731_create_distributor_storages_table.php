<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistributorStoragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sh_distributor_storages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('distributor_id');
            $table->string('title', 255)->unique();
            $table->string('description', 455)->nullable();
            $table->smallInteger('delivery_days')->nullable();
            $table->smallInteger('import_sequence_number')->default(0);
            $table->timestamps();

            $table->foreign('distributor_id')
                ->references('id')
                ->on('sh_distributors')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sh_distributor_storages');
    }
}

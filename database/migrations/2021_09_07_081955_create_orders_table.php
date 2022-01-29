<?php

use App\Models\Shop\Order\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sh_orders', function (Blueprint $table) {
            $table->id();
            $table->string('number')->unique();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->longText('cart');
            $table->unsignedInteger('cart_quantity');
            $table->decimal('cart_total', 13, 2);
            $table->string('status', 25)->default(Order::ORDER_STATUS_NEW);
            $table->string('payment_id', 64)->nullable();
            $table->string('payment_method', 25)->nullable();
            $table->boolean('payment_status')->default(false);
            $table->string('customer_email')->nullable();
            $table->string('customer_first_name')->nullable();
            $table->string('customer_last_name')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('delivery_method', 25)->nullable();
            $table->string('delivery_region', 255)->nullable();
            $table->string('delivery_city', 255)->nullable();
            $table->string('delivery_warehouse', 455)->nullable();
            $table->text('note')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sh_orders');
    }
}

<?php

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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->json('order_info'); // Добавляем поле JSON с названием "order"
            $table->timestamps();
            $table->varchar('is_ready')->default('В работе'); // Добавляем поле is_ready
            $table->json('user_info'); // Добавляем поле JSON с названием "order"
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

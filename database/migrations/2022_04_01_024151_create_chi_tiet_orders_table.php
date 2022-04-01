<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_orders', function (Blueprint $table) {
            $table->unsignedBigInteger("order_id");
            $table->unsignedBigInteger("chitietdon_id");

            $table->primary(['order_id', 'chitietdon_id']);

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');;
            $table->foreign('chitietdon_id')->references('id')->on('chi_tiet_dons');
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
        Schema::dropIfExists('chi_tiet_orders');
    }
};

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
        Schema::create('topping_thems', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("chiTietDon_id");
            $table->string("ten")->nullable();
            $table->BigInteger("gia");
            $table->integer("soluong");
            $table->unsignedBigInteger("mon_id");

            
            $table->foreign('mon_id')->references('id')->on('mons');
            $table->foreign('chiTietDon_id')->references('id')->on('chi_tiet_dons');
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
        Schema::dropIfExists('topping_thems');
    }
};

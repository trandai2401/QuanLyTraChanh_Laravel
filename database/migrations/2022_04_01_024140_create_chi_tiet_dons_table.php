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
        Schema::create('chi_tiet_dons', function (Blueprint $table) {
            $table->id();
            $table->String('ten');
            $table->bigInteger("gia");
            $table->bigInteger("soluong");
            $table->unsignedBigInteger("mon_id");
            $table->foreign('mon_id')->references('id')->on('mons');

    
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
        Schema::dropIfExists('chi_tiet_dons');
    }
};

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
        Schema::create('chi_tiet_hoa_dons', function (Blueprint $table) {
            $table->unsignedBigInteger("hoaDon_id");
            $table->unsignedBigInteger("chitietdon_id");

            $table->primary(['hoaDon_id', 'chitietdon_id']);
            $table->foreign('hoaDon_id')->references('id')->on('hoa_don_thanh_toans');
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
        Schema::dropIfExists('chi_tiet_hoa_dons');
    }
};

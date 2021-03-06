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
        Schema::create('hoa_don_thanh_toans', function (Blueprint $table) {
     

            $table->id();
            
            $table->datetime('thoigianvao')->nullable();
            $table->datetime('thoigianthanhtoan')->nullable();
            $table->bigInteger("tongtien")->nullable();
            $table->unsignedBigInteger("create_by");
            $table->unsignedBigInteger("collected_by");
            $table->unsignedBigInteger("chuongtrinhgiamgia_id")->nullable();


            $table->foreign('create_by')->references('id')->on('users');
            $table->foreign('collected_by')->references('id')->on('users');
            $table->foreign('chuongtrinhgiamgia_id')->references('id')->on('chuong_trinh_giam_gias');

           

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
        Schema::dropIfExists('hoa_don_thanh_toans');
    }
};

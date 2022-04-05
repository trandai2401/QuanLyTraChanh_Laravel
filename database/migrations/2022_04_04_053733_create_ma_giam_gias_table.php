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
        Schema::create('ma_giam_gias', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->integer('phantram')->nullable();
            $table->integer('sotien')->nullable();

            $table->date("thoigianbatdau");
            $table->date("thoigianketthuc");
            $table->boolean('trangthai');
            $table->unsignedBigInteger("hoadonthanhtoan_id")->nullable();

            
            $table->foreign('hoadonthanhtoan_id')->references('id')->on('hoa_don_thanh_toans');

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
        Schema::dropIfExists('ma_giam_gias');
    }
};

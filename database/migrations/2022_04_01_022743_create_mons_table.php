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
        Schema::create('mons', function (Blueprint $table) {
            $table->id();
            $table->string('ten');
            $table->bigInteger("gia");
            $table->boolean('trangthai');

            $table->unsignedBigInteger('danhmuc_id');
            $table->foreign('danhmuc_id')->references('id')->on('danh_mucs');
            $table->string('created_by');
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
        Schema::dropIfExists('mons');
    }
};

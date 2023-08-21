<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('thuc_ans', function (Blueprint $table) {
            $table->id();
            $table->string('ten_san_pham');
            $table->string('slug_san_pham');
            $table->string('anh');
            $table->integer('gia');
            $table->longText('mieu_ta');
            $table->integer('trang_thai');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('thuc_ans');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cat_controllers', function (Blueprint $table) {
            $table->id();
            $table->string('ten_thu');
            $table->string('slug_thu');
            $table->string('hinh_anh');
            $table->string('loai');
            $table->integer('gia_ban');
            $table->longText('mo_ta');
            $table->integer('tinh_trang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cat_controllers');
    }
};

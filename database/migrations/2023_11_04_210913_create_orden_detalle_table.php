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
        Schema::create('orden_detalle', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ord_id');
            $table->unsignedBigInteger('prod_id');

            $table->foreign('ord_id')->references('id')->on('orden');
            $table->foreign('prod_id')->references('id')->on('producto');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden_detalle');
    }
};

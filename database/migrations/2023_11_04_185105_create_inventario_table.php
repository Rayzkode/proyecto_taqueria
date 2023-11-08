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
        Schema::create('inventario', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->decimal("habia", 10, 2);
            $table->decimal("entró", 10, 2);
            $table->decimal("quedó", 10, 2);
            $table->decimal("gasto", 10, 2);
            $table->decimal("precio", 10, 2);
            $table->date("fecha");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventario');
    }
};

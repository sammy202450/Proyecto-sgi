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
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('modelo');
            $table->string('serie');
            $table->string('marca');
            $table->string('titulo');
            $table->string('descripcion');
            $table->string('imagen');
            $table->integer('cantidad');
            $table->string('nota');
            $table->string('status');
            $table->date('fecha_compra');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventarios');
    }
};

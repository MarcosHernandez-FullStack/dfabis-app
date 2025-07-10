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
        Schema::create('delivery', function (Blueprint $table) {
            $table->id();
            $table->string('direccion');
            $table->string('nombre_conductor');
            $table->string('cel_cliente_ref',20);
            $table->string('cel_conductor',20);
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->enum('progreso', ['encamino', 'endestino'])->default('encamino');
            $table->decimal('costo', 8, 2);
            $table->decimal('ganancia', 8, 2);
            $table->foreignId('pedido_id')->constrained('pedido');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery');
    }
};

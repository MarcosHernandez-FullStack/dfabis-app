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
        Schema::create('agregado', function (Blueprint $table) {
            $table->id();
            $table->decimal('precio', 8, 2);
            $table->integer('cantidad');
            $table->foreignId('detalle_pedido_id')->constrained('detalle_pedido');
            $table->foreignId('producto_id')->constrained('producto');
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agregado');
    }
};

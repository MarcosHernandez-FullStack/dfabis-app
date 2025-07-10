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
        Schema::create('pedido', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo', ['mesa', 'delivery'])->default('mesa');
            $table->string('ruta_comprobante')->nullable();
            $table->string('cliente_referencia')->nullable();
            $table->text('observacion')->nullable();
            $table->enum('forma_pago', ['efectivo','yape','plin','transferencia'])->default('efectivo');
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->foreignId('cliente_id')->nullable()->constrained('cliente');
            $table->foreignId('mesa_id')->nullable()->constrained('mesa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedido');
    }
};

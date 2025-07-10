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
        Schema::create('producto', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->decimal('precio', 8, 2);
            $table->integer('stock');
            $table->foreignId('unidad_id')->constrained('unidad');
            $table->foreignId('categoria_id')->constrained('categoria');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto');
    }
};

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
        Schema::create('detalle_crema', function (Blueprint $table) {
            $table->id();
            $table->foreignId('crema_id')->constrained('crema');
            $table->foreignId('detalle_pedido_id')->constrained('crema');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_crema');
    }
};

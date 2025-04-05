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
        Schema::create('calculos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Id_usuario')->nullable()->constrained('usuarios')->onDelete('cascade');
            $table->foreignId('Id_electrodomestico')->nullable()->constrained('electrodomesticos')->onDelete('cascade');
            $table->integer('Horas_activas');
            $table->decimal('Consumo', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calculos');
    }
};

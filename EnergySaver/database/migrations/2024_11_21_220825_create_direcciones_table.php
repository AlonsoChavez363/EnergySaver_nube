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
        Schema::create('direcciones', function (Blueprint $table) {
            $table->id();
            $table->string('Calle', 100);
            $table->string('Numero', 10);
            $table->string('Colonia', 100);
            $table->string('CP', 10);
            $table->string('Estado', 50);
            $table->string('Ciudad', 50);
            $table->foreignId('Id_casas')->nullable()->constrained('casas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('direcciones');
    }
};

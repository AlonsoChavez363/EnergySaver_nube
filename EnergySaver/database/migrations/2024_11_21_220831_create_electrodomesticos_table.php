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
        Schema::create('electrodomesticos', function (Blueprint $table) {
            $table->id();
            $table->decimal('Potencia', 10, 2);
            $table->foreignId('Id_tipo')->nullable()->constrained('tipo_electrodomesticos')->onDelete('cascade');
            $table->foreignId('Id_marca')->nullable()->constrained('marcas')->onDelete('cascade');
            $table->foreignId('Id_modelo')->nullable()->constrained('modelos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('electrodomesticos');
    }
};

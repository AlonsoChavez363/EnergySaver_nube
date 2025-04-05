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
        Schema::create('administradores', function (Blueprint $table) {
            $table->id(); // Llave primaria
            $table->string('nombre', 50); // Nombre del administrador
            $table->string('apellidos', 100); // Apellidos del administrador
            $table->string('correo', 100)->unique(); // Correo único
            $table->string('contraseña'); // Contraseña encriptada
            $table->foreignId('Id_genero')->constrained('generos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administradores');
    }
};

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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre', 50);
            $table->string('Apellidos', 100);
            $table->foreignId('Id_genero')->constrained('generos')->onDelete('cascade');
            $table->date('Fecha_nacimiento');
            $table->string('Correo', 100)->unique();
            $table->string('Contraseña', 255);
            $table->enum('role', ['user', 'admin'])->default('user'); // Campo para el rol
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};

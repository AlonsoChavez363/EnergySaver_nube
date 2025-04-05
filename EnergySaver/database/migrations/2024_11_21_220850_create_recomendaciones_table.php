<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecomendacionesTable extends Migration
{
    public function up()
    {
        Schema::create('recomendaciones', function (Blueprint $table) {
            $table->id('Id_recomendaciones');
            $table->string('Nombre', 100);
            $table->text('Descripción');
            $table->foreignId('Id_usuario')->nullable()->constrained('usuarios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recomendaciones');
    }
};
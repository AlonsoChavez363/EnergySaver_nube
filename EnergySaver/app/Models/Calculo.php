<?php

namespace App\Models;

use App\Http\Controllers\ElectrodomesticoController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculo extends Model
{
    use HasFactory;

    protected $table = 'calculos'; // Tabla que representa
    protected $primaryKey = 'id'; // Clave primaria
    public $timestamps = true; // Manejo automático de created_at y updated_at

    protected $fillable = [
        'id_usuario',
        'id_electrodomestico',
        'Horas_activas',
        'Consumo',
        'created_at',
        'updated_at',
    ];

    // Relación con usuarios
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    // Relación con electrodomésticos
    public function electrodomestico()
    {
        return $this->belongsTo(ElectrodomesticoController::class, 'id_electrodomestico');
    }
}

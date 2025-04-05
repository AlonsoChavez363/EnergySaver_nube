<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Indicar la tabla personalizada
    protected $table = 'usuarios';

    protected $primaryKey = 'id';

    // Campos que se pueden llenar
    protected $fillable = [
        'Correo', 
        'Contraseña', 
        'role', // Define si es 'user' o 'admin'
    ];

    // Ocultar campos sensibles
    protected $hidden = [
        'Contraseña', 
        'remember_token',
    ];

    // Indicar el campo para la contraseña
    public function getAuthPassword()
    {
        return $this->Contraseña;
    }

    // Relación con la tabla `calculos`
    public function calculos()
    {
        return $this->hasMany(Calculo::class, 'id_usuario');
    }
    
}

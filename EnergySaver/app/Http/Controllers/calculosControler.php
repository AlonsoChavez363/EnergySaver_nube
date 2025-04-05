<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Calculo;

class calculosControler extends Controller
{
    public function guardarCalculos(Request $request)
{
    // Verifica si el usuario está autenticado
    if (!auth()->check()) {
        return response()->json(['success' => false, 'message' => 'Usuario no autenticado.'], 401);
    }

    // Obtén el ID del usuario autenticado
    $idUsuario = auth()->id();

    $datos = $request->input('electrodomesticos');

    if (!$idUsuario || !is_array($datos) || count($datos) === 0) {
        return response()->json(['success' => false, 'message' => 'Datos incompletos.']);
    }

    try {
        foreach ($datos as $electrodomestico) {
            Calculo::create([
                'id_usuario' => $idUsuario,
                'id_electrodomestico' => $electrodomestico['id_electrodomestico'],
                'Horas_activas' => $electrodomestico['horas_activas'],
                'Consumo' => $electrodomestico['consumo'],
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Cálculos guardados correctamente.']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Error al guardar los cálculos.', 'error' => $e->getMessage()]);
    }
}

}

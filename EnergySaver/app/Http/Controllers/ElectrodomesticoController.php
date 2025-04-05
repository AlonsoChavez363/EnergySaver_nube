<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ElectrodomesticoController extends Controller
{
    public function getMarcas()
    {
        return response()->json(DB::table('marcas')->select('nombre')->get());
    }

    public function getElectrodomesticos(Request $request)
    {
        $marcaNombre = $request->query('marca');
        $marca = DB::table('marcas')->where('nombre', $marcaNombre)->first();

        if (!$marca) {
            return response()->json(['error' => 'Marca no encontrada.'], 404);
        }

        $tipos = DB::table('electrodomesticos')
            ->join('tipo_electrodomesticos', 'electrodomesticos.id_tipo', '=', 'tipo_electrodomesticos.id')
            ->where('electrodomesticos.id_marca', $marca->id)
            ->select('tipo_electrodomesticos.nombre')
            ->distinct()
            ->get();

        return response()->json($tipos);
    }

    public function getPotencia(Request $request)
    {
        $marcaNombre = $request->query('marca');
        $electrodomesticoNombre = $request->query('electrodomestico');

        $marca = DB::table('marcas')->where('nombre', $marcaNombre)->first();
        if (!$marca) {
            return response()->json(['error' => 'Marca no encontrada.'], 404);
        }

        $potencia = DB::table('electrodomesticos')
            ->join('tipo_electrodomesticos', 'electrodomesticos.id_tipo', '=', 'tipo_electrodomesticos.id')
            ->where('electrodomesticos.id_marca', $marca->id)
            ->where('tipo_electrodomesticos.nombre', $electrodomesticoNombre)
            ->value('electrodomesticos.potencia');

        if (!$potencia) {
            return response()->json(['error' => 'Electrodoméstico no encontrado.'], 404);
        }

        return response()->json(['potencia' => $potencia]);
    }

    public function guardarCalculos(Request $request)
{
    // Obtener el usuario autenticado desde la sesión
    $authUser = session('auth_user');
    $authType = session('auth_type');

    if (!$authUser) {
        return redirect()->route('login')->withErrors(['error' => 'Debe iniciar sesión para continuar.']);
    }

    // Usar la información del usuario
    $idUsuario = $authUser->id;

    foreach ($request->input('electrodomesticos') as $electrodomestico) {
        DB::table('calculos')->insert([
            'id_usuario' => $idUsuario,
            'id_electrodomestico' => $electrodomestico['id_electrodomestico'],
            'horas_activas' => $electrodomestico['horas_activas'],
            'consumo' => $electrodomestico['consumo'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    return response()->json(['success' => true, 'message' => 'Cálculos guardados exitosamente.']);
}


}

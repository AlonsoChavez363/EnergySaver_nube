<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class infoUsuario extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuario = DB::table('usuarios')->get();
        return view('infoUsuarios', compact('infoUsuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'correo' => 'required|email|max:255',
            'contrasena' => 'nullable|string|min:6' // Puede ser opcional si el usuario no quiere cambiarla
        ]);
    
        // Buscar el usuario en la base de datos
        $usuario = Usuario::findOrFail($id);
    
        // Actualizar solo los campos que se envían en la petición
        $usuario->update($request->only(['nombre', 'apellido', 'fecha_nacimiento', 'correo']));
    
        // Si se proporciona una nueva contraseña, actualizarla
        if ($request->filled('contrasena')) {
            $usuario->contrasena = bcrypt($request->input('contrasena')); // Encriptar la contraseña antes de guardarla
            $usuario->save();
        }
    
        return redirect()->back()->with('success', 'Información actualizada correctamente.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

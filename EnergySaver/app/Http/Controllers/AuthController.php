<?php

namespace App\Http\Controllers;

use App\Http\Requests\validadorLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); 
    }
    // Manejar el inicio de sesión
    public function login(validadorLogin $request)
    {
        // Autenticar al usuario utilizando los datos validados
        if (Auth::attempt([
            'Correo' => $request->input('correo'), // Asegúrate de que coincida con la base de datos
            'password' => $request->input('contraseña'), // Laravel lo traduce a "Contraseña" gracias a getAuthPassword
        ], $request->remember)) {
            $request->session()->regenerate();

            // Redirigir según el rol del usuario
            if (Auth::user()->role === 'admin') {
                return redirect()->route('rutaAdmin'); // Redirige a la vista para administradores
            }

            return redirect()->route('rutaHome'); // Redirige a la vista para usuarios normales
        }

        // Si la autenticación falla
        return back()->withErrors([
            'correo' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('correo');
    }

    // Manejar el cierre de sesión
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('rutaLogin'); // Redirige al formulario de inicio de sesión
    }
}

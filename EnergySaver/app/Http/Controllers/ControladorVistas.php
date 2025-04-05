<?php

namespace App\Http\Controllers;

use App\Http\Requests\validadorLogin;
use App\Http\Requests\validadorRegistro;
use Illuminate\Http\Request;

class ControladorVistas extends Controller
{
    public function welcome(){
        return view('welcome');
    }

    public function calculadora(){
        return view('calculadora');
    }


    public function login(){
        return view('login');
    }

    public function home(){
        return view('home');
    }

    public function calcula(){
        return view('calcu');
    }

    public function vinculacion(){
        return view('vinculaciones');
    }


    public function visual(){
        return view('visualizacion');
    }

    public function consejo(){
        return view('consejos');
    }

    public function Administrador(){
        return view('Admin');
    }

    public function Contacto(){
        return view('contacto');
    }

    public function inicioSesion(validadorLogin $peticion){
    $correo = $peticion->input('correo');

    session()->flash('exito', 'Inicio de sesión correcto para: ' . $correo);

    return to_route('rutaLogin');
    }

    public function chatbot(){
        return view('chatbot');
    }

    public function usuario(){
        return view('infoUsuarios');
    }

}

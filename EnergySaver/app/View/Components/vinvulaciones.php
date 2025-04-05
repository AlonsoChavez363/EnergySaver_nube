<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class vinvulaciones extends Component
{
    public $encabezado;
    public $txtboton;
    public $descripcion;
    public $carac1;
    public $carac2;
    public $carac3;
    public $imagen;
    public $mostrarImagen;

    public function __construct($encabezado, $txtboton = null, $descripcion=null, $carac1=null,$carac2=null, $carac3=null, $imagen = null, $mostrarImagen = true)
    {
        $this->encabezado = $encabezado;
        $this->txtboton = $txtboton;
        $this->descripcion = $descripcion;
        $this->carac1 = $carac1;
        $this->carac2 = $carac2;
        $this->carac3 = $carac3;
        $this->imagen = $imagen;
        $this->mostrarImagen = $mostrarImagen;
    }

    
    public function render(): View|Closure|string
    {
        return view('components.vinvulaciones');
    }
}

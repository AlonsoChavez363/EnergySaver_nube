<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\calculosControler;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorVistas;
use App\Http\Controllers\ElectrodomesticoController;
use App\Http\Controllers\UsuariosAdminController;
use App\Http\Controllers\usuariosControler;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\infoUsuario;




Route::get('/', [ControladorVistas::class, 'welcome'])->name('rutaInicio');
Route::get('/Calculadora', [ControladorVistas::class, 'calculadora'])->name('rutaCalculadora');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('rutaLogin');
Route::get('/home', [ControladorVistas::class, 'home'])->name('rutaHome');
Route::get('/calcu', [ControladorVistas::class, 'calcula'])->name('rutaCalcu');
Route::get('/vinculaciones', [ControladorVistas::class, 'vinculacion'])->name('rutaVinculaciones');
Route::get('/contactos', [ControladorVistas::class, 'Contacto'])->name('rutaContacto');
Route::get('/visual', [ControladorVistas::class, 'visual'])->name('rutaVisual');
Route::get('/consejos', [ControladorVistas::class, 'consejo'])->name('rutaConsejos');

Route::post('/entrar', [ControladorVistas::class, 'inicioSesion'])->name('rutaEntrar');


//rutas usuariosController
Route::get('/usuario/create', [usuariosControler::class, 'create'])->name('rutaFormulario');
Route::post('/Registro', [usuariosControler::class, 'store'])->name('EnviarRegistro');

//Rutas de Administrado

// Ruta para mostrar el formulario
Route::get('/usuarioAdmin/create', [UsuariosAdminController::class, 'create'])->name('rutaAdminForm');

// Ruta para procesar el formulario
Route::post('/registroAdmin', [UsuariosAdminController::class, 'store'])->name('EnviarAdmin');

// Ruta para la vista principal del panel de control
Route::get('/admin', [ControladorVistas::class, 'Administrador'])->name('rutaAdmin');

//Ruta visualizar Administradores
Route::get('/Visual/Admins', [UsuariosAdminController::class,'index'])->name('rutaAdmisVisualizacion');
//Ruta para visualizar Usuarios
Route::get('/Visual/Usua', [UsuariosAdminController::class,'indexUsuarios'])->name('rutaAdminVisualUsuarios');

//Ruta para validar si es administrador o usuario
Route::post('/entrar', [AuthController::class, 'login'])->name('login');

//Rutas para Envio de Datos a La Calculadora
Route::get('/marcas', [ElectrodomesticoController::class, 'getMarcas']);
Route::get('/electrodomesticos', [ElectrodomesticoController::class, 'getElectrodomesticos']);
Route::get('/potencia', [ElectrodomesticoController::class, 'getPotencia']);
Route::get('/tipos-electrodomesticos', [ElectrodomesticoController::class, 'getTiposPorMarca']);

Route::post('/guardar-calculos', [calculosControler::class, 'guardarCalculos'])->middleware('auth')->name('guardarCalculos');
Route::post('/logout', [AuthController::class, 'logout'])->name('rutaSalir');

//Rutas para el chatbot
Route::get('/chatbot',[ControladorVistas::class, 'chatbot'])->name('rutaChatBot');
Route::get('/chatbot/inicio', [ChatBotController::class, 'index'])->name('chatbot');
Route::post('/chatbot/mensaje', [ChatBotController::class, 'procesarMensaje'])->name('chatbot.mensaje');
Route::post('/chatbot/procesar', [ChatbotController::class, 'procesar'])->name('chatbot.procesar');

//Rutas para edicion de usuarios
Route::get('/usuarios', [ControladorVistas::class, 'usuario'])->name('infoUsuario');
Route::patch('/usuario/{id}', [UsuarioController::class, 'update'])->name('usuario.update');

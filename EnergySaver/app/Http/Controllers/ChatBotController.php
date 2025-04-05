<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatBotController extends Controller
{
    public function index()
    {
        return view('chatbot');
    }

    public function procesar(Request $request)
    {
        $mensaje = strtolower($request->input('mensaje', ''));
        $response = [];

        $menu = "<br><br>¿En qué más te puedo ayudar? Selecciona una opción:
        <ul>
            <li>1. ¿Cómo funciona la página?</li>
            <li>2. ¿Cómo puedo registrarme?</li>
            <li>3. ¿Qué hacer si la marca que busco no aparece en las opciones?</li>
            <li>4. ¿Qué sucede si no encuentro mi electrodoméstico?</li>
            <li>5. ¿Cómo puedo agregar un electrodoméstico?</li>
            <li>6. ¿Cómo puedo contactarlos?</li>
            <li>7. ¿Cómo recuperar mi contraseña si la olvidé?</li>
            <li>8. ¿Cómo puedo editar mi perfil o actualizar mi información?</li>
            <li>9. ¿Puedo eliminar mi cuenta si ya no quiero usar la plataforma?</li>
            <li>10. ¿Cómo reportar un problema o error en la página?</li>
        </ul>";

        switch ($mensaje) {
            case 'hola':
            case 'buenas':
            case 'iniciar':
                $response = ['message' => "¡Hola! " . $menu];
                break;

            case '1':
                $response = ['message' => "<strong>Energy Saber es una plataforma diseñada para ayudarte a monitorear y optimizar tu consumo energético.</strong><br>
                Puedes seleccionar un electrodoméstico y especificar su uso diario para calcular la energía consumida. Con esta información, 
                podrás tomar decisiones informadas sobre cómo reducir o mantener tu consumo, beneficiando tu economía y contribuyendo al cuidado del medio ambiente." . $menu];
                break;

            case '2':
                $response = ['message' => "<strong>Para registrarte:</strong><br>
                Dirígete a la página principal o haz clic en el icono ubicado en la parte superior derecha. 
                Se te solicitarán datos básicos como nombre, apellido, correo electrónico, fecha de nacimiento y una contraseña. 
                Una vez completado el formulario correctamente, recibirás un correo con un código de confirmación para activar tu cuenta y acceder a la plataforma." . $menu];
                break;
            
            case '3':
                $response = ['message' => "<strong>Si la marca que buscas no aparece en nuestra lista:</strong><br>
                Verifica que el nombre esté escrito correctamente. 
                Si aún no la encuentras, es posible que la marca aún no esté disponible en nuestro sistema. 
                Sin embargo, puedes enviarnos un mensaje para solicitar su inclusión en futuras actualizaciones." . $menu];
                break;
            
            case '4':
                $response = ['message' => "<strong>Si el electrodoméstico que buscas no aparece en nuestra lista:</strong><br>
                Asegúrate de haber ingresado correctamente su nombre. 
                Si sigue sin estar disponible, es posible que aún no haya sido agregado a nuestro sistema. 
                Puedes enviarnos una solicitud para considerar su inclusión en nuestra base de datos." . $menu];
                break;

            case '5':
                $response = ['message' => "<strong>Solo nuestro equipo puede agregar nuevos electrodomésticos a la base de datos.</strong><br>
                Si deseas que un nuevo modelo sea considerado, puedes enviarnos una solicitud a través de nuestro formulario de contacto o correo electrónico." . $menu];
                break;

            case '6':
                $response = ['message' => "<strong>Para contactarnos:</strong><br>
                Puedes escribirnos a <strong>energysaver@gmail.com</strong>. 
                Estaremos encantados de atenderte y resolver cualquier consulta o sugerencia que tengas." . $menu];
                break;

            case '7':
                $response = ['message' => "<strong>Si olvidaste tu contraseña:</strong><br>
                Dirígete a la sección de inicio de sesión y selecciona la opción <strong>'Olvidé mi contraseña'</strong>. 
                Luego, completa el formulario con la información solicitada. Si los datos son correctos, recibirás un correo con un código de confirmación 
                para restablecer tu contraseña y recuperar el acceso a tu cuenta." . $menu];
                break;

            case '8':
                $response = ['message' => "<strong>Para actualizar tu información personal:</strong><br>
                Accede a tu perfil desde el icono ubicado en la parte superior derecha. 
                Selecciona la opción <strong>'Editar información'</strong>, realiza los cambios necesarios en el formulario y guarda las modificaciones." . $menu];
                break;

            case '9':
                $response = ['message' => "<strong>Si deseas eliminar tu cuenta:</strong><br>
                Dirígete a la configuración de tu perfil y selecciona la opción <strong>'Eliminar cuenta'</strong>. 
                Ten en cuenta que esta acción es irreversible y perderás todos los datos almacenados en tu cuenta." . $menu];
                break;

            case '10':
                $response = ['message' => "<strong>Para reportar un problema o error en la plataforma:</strong><br>
                Por favor, repórtalo enviándonos un correo a <strong>energysaver@gmail.com</strong>. 
                Nos aseguraremos de revisar tu solicitud y brindarte una solución lo antes posible." . $menu];
                break;

            default:
                $response = ['message' => '<strong>No comprendí tu solicitud.</strong> Por favor, selecciona una opción válida del menú.' . $menu];
        }

        return response()->json($response);
    }
}

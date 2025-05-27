<?php

namespace App\Http\Controllers;

use App\Entidades\Cliente;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class ControladorWebRecuperarClave extends Controller
{
    public function index()
    {
        return view("web.recuperar-clave");
    }

    public function recuperar(Request $request){

        $correo = $request->input("txtCorreo");
        $clave = rand(1000, 9999);

        $cliente = new Cliente();
        $cliente->obtenerPorCorreo($correo);
        if ($cliente->correo != "") {
            
            $data = "Instrucciones";

            $mail = new PHPMailer(true);
            try{
                //Server settings
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host = env('MAIL_HOST');         //a partir de acá toma todo del archivo .env, son constantes. esto lo provee el hosting.
                $mail->SMTPAuth = true;
                $mail->Username = env('MAIL_USERNAME');
                $mail->Password = env('MAIL_PASSWORD');
                $mail->SMTPSecure = env('MAIL_ENCRYPTION');
                $mail->Port = env('MAIL_PORT');

                //Recipients (arma los destinatarios)
                $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
                $mail->addAddress('info@lucysburgers.com');

                //Contenido del mail, este lo resive la hamburguesería
                $mail->isHTML(true);
                $mail->Subject = 'Recupero de clave';
                $mail->Body = "Los datos de acceso son:
                Usuario: $cliente->correo
                Clave: $clave";

                //mail->send();
                $mensaje = "Te enviamos la nueva clave al correo ingresado.";

                //Actualizar en el cliente la nueva ya encriptada

                return view('web.recuperar-clave', compact('mensaje'));

            } catch (Exception $e) {
                $mensaje = "Se produjo un error al enviar el correo.";
                return view('web.recuperar-clave', compact('mensaje'));
            }
        } else {
            $mensaje = "El correo ingresado no existe.";
            return view('web.recuperar-clave', compact('mensaje'));
        }
    }
}

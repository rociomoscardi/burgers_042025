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

    public function recuperar(Request $request)
    {

        $correo = $request->input("txtCorreo");
        $clave = rand(1000, 9999);

        $cliente = new Cliente();
        $cliente->obtenerPorCorreo($correo);

        if ($cliente->correo != "") {

            $data = "Instrucciones";

            $mail = new PHPMailer(true);
            try {
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
                $mail->Body = "Los datos de acceso son:<br>
                <strong>Usuario:</strong> {$cliente->correo}<br>
                <strong>Clave:</strong> {$clave}";

                //$mail->send();

                //Actualizar en el cliente la nueva ya encriptada
                $cliente->clave = password_hash($clave, PASSWORD_DEFAULT);
                $cliente->guardar();

                $mensaje1 = "Te enviamos tu nueva contraseña al correo ingresado! ($clave)";
                return view('web.recuperar-clave', compact('mensaje1'));
            } catch (Exception $e) {
                $mensaje2 = "Se produjo un error al enviar el correo. Mensaje: " . $e->getMessage();
                return view('web.recuperar-clave', compact('mensaje2'));
            }
        } else {
            $mensaje = "El correo ingresado no existe.";
            return view('web.recuperar-clave', compact('mensaje'));
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Entidades\Cliente;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ControladorWebContacto extends Controller
{
    public function index()
    {
        return view("web.contacto");
    }

    public function enviar(Request $request)
    {

        $correo = $request->input("txtCorreo");

        $cliente = new Cliente();
        $cliente->obtenerPorCorreo($correo);
        if ($cliente->correo != "") {

            //$data = "Instrucciones";

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
                $mail->Subject = 'Gracias por contactarte';             //en el cuerpo del mail van los datos del formulario.
                $mail->Body =  "
                    <strong>Cliente:</strong> {$cliente->nombre_comp}<br>
                    <strong>Correo:</strong> {$cliente->correo}<br>
                    <strong>Teléfono:</strong> {$cliente->telefono}<br>
                    <strong>Mensaje:</strong> {$request->input('txtMensaje')}
                ";

                //$mail->send();

                return view('web.contacto-gracias');
            } catch (Exception $e) {
                $mensaje = "Se produjo un error al enviar tu postulación.";
                return view('web.contacto', compact('mensaje'));
            }
        } else {
            $mensaje = "No se encontró un cliente con ese correo.";
            return view('web.contacto', compact('mensaje'));
        }
    }
}

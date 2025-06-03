<?php

namespace App\Http\Controllers;

use App\Entidades\Cliente;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Session;

class ControladorWebContacto extends Controller
{
    public function index()
    {
        $idCliente = Session::get("idCliente");
        $cliente = new Cliente();
        $cliente->obtenerPorId($idCliente);

        return view("web.contacto", compact('cliente'));
    }

    public function enviar(Request $request)
    {

        $nombre = $request->input("txtNombre");
        $correo = $request->input("txtCorreo");
        $telefono = $request->input("txtTelefono");
        $mensaje = $request->input('txtMensaje');

        $cliente = new Cliente();
        $cliente->obtenerPorCorreo($correo);
        if ($cliente->nombre_comp != "" && $cliente->correo != "" && $cliente->telefono != "" && $mensaje != "") {

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
                    <strong>Cliente:</strong> $nombre <br>
                    <strong>Correo:</strong> $correo <br>
                    <strong>Teléfono:</strong> $telefono <br>
                    <strong>Mensaje:</strong> $mensaje <br>
                ";

                //$mail->send();

                return view('web.contacto-gracias');
            } catch (Exception $e) {
                $cliente = new Cliente();
                $cliente->obtenerPorCorreo($correo);

                $mensaje = "Se produjo un error al enviar tu mensaje.";
                return view('web.contacto', compact('mensaje', 'cliente'));
            }
        } else {
            $cliente = new Cliente();
            $cliente->obtenerPorCorreo($correo);

            $mensaje = "Complete todos los datos.";
            return view('web.contacto', compact('mensaje', 'cliente'));
        }
    }
}

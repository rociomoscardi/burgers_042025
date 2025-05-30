<?php

namespace App\Http\Controllers;

use App\Entidades\Postulacion;
use Illuminate\Http\Request;

require app_path() . '/start/constants.php';

class ControladorWebNosotros extends Controller
{
    public function index()
    {
        return view("web.nosotros");
    }

    public function insertarPostulacion(Request $request)
    {

        $entidad = new Postulacion();
        $entidad->nombre_comp = $request->input("txtNombre");
        $entidad->correo = $request->input("txtCorreo");
        $entidad->telefono = $request->input("txtTelefono");
        $entidad->link_cv = $request->input("fileCV");

        if ($_FILES["fileCV"]["error"] === UPLOAD_ERR_OK) { //Se adjunta imagen
            $extension = pathinfo($_FILES["fileCV"]["name"], PATHINFO_EXTENSION);
            $nombre = date("Ymdhmsi") . ".$extension";
            $archivo = $_FILES["fileCV"]["tmp_name"];
            if ($extension == "pdf" || $extension == "doc" || $extension == "docx") {
                move_uploaded_file($archivo, env('APP_PATH') . "/public/files/$nombre"); //guardaelarchivo
            } else {
                return "";
            }
            $entidad->link_cv = $nombre;
        }

        if ($entidad->nombre_comp == "" || $entidad->correo == "" || $entidad->telefono == "" || $entidad->link_cv == "") {
            $msg["ESTADO"] = MSG_ERROR;
            $msg["MSG"] = "Complete todos los datos.";
            return view('web.nosotros', compact('msg'));
        } else {
            $entidad->guardar();

            $entidad->insertar();
            return view('web.postulacion-gracias');
        }
    }
}

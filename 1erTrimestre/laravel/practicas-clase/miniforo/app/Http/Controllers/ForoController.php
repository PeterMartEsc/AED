<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Mensaje;


class ForoController extends Controller
{
    public function devolverForo(Request $request){

        $usuario = $request->input('log-in');

        if(empty($usuario)){
            return view('login');
        }

        session()->put('usuario', $usuario);
        //echo $usuario;

        return view('foro', compact('usuario'));

    }

    public function crearMensaje(){

        //echo "tessst";
        //die();

        $id = rand(1,1000);
        $titulo = request()->input('tituloMensaje');
        $cuerpo = request()->input('cuerpo');

        $mensaje = new Mensaje ($id, $titulo, $cuerpo);

        almacenarMensaje($mensaje);
    }

    public function almacenarMensaje(Mensaje $mensaje){

        if(!file_exists("/storage/mensajes.txt")){
            file_put_contents("/storage/mensajes.txt" , " ");
        }

        file_put_contents("/storage/mensajes.txt", $mensaje.getId(), FILE_APPEND);
        file_put_contents("/storage/mensajes.txt", $mensaje.getTitulo(), FILE_APPEND);
        file_put_contents("/storage/mensajes.txt", $mensaje.getMensaje() . "\n", FILE_APPEND);

        return view('foro');
    }

}

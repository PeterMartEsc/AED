<?php

namespace App\Http\Controllers;

use App\DAO\FiguraDAO;
use App\DAO\UsuarioDAO;
use App\DAO\TableroDAO;
use App\Models\Tablero;
use DateTime;
use Illuminate\Http\Request;

/**
 * Pasos:
 *
 * 1.- Hacer tableros_figuras contract, model y DAO
 * 2.- Guardar imagenes en la bbdd
 * 4.- Crear tableros
 */

class Controller_tablero{

    protected $usuarioDAO;
    protected $tableroDAO;
    protected $figuraDAO;


    public function __construct(){
        $this->usuarioDAO = new UsuarioDAO();
        $this->tableroDAO = new TableroDAO();
        $this->figuraDAO = new FiguraDAO();
    }

    function mostrarFiguras(){

        $figuras = $this->figuraDAO->findAll();

    }

    function nombrarTablero(){
        $nombre = session()->get('nombre');

        echo "<h2>Crear tablero para $nombre </h2>";
        echo "<form action='/crearTablero'>";
        echo "  <label for='tableroName'>Nombre del tablero</label><br/><br/>";
        echo "  <input type='text' name='tableroName'/>";
        echo "  <input type='submit' value='Crear'/>";
        echo "</form>";

    }

    function crearTablero(Request $request){
        $nombre = session()->get('nombre');

        $tableroName = $request->get('tableroName');

        $fecha = date("Y-m-d");
        $fechaModel = new DateTime();
        $hora = date("H:i:s");

        $tableroName = $tableroName."_".$fecha."_".$hora;
        //dd($tableroName);

        $usuario = $this->usuarioDAO->findByName($nombre);
        $usuarioId = $usuario->getId();

        $tablero = new Tablero();
        $tablero->setUsuarioId($usuarioId);
        $tablero->setNombre($tableroName);
        $tablero->setContenido(" ");
        $tablero->setFecha($fechaModel);

        $this->tableroDAO->save($tablero);

        $this->obtainTableros();

        return redirect('/game');
    }

    function obtainTableros(){
        $nombre = session()->get('nombre');
        $usuario = $this->usuarioDAO->findByName($nombre);
        $usuarioId = $usuario->getId();
        //dd($usuarioId);
        $tableros = $this->tableroDAO->findByUserId($usuarioId);

        if($tableros == null){
            return;
        }

        $nombres = [];

        foreach($tableros as $tablero){
            $nombreTablero = $tablero->getNombre();
            $nombres[] = $nombreTablero;
        }

        session()->put('tablerosNames', $nombres);
    }

}

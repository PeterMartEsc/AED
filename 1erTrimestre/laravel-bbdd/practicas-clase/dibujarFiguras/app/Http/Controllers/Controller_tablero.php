<?php

namespace App\Http\Controllers;

use App\DAO\FiguraDAO;
use App\DAO\Figuras_TablerosDAO;
use App\DAO\UsuarioDAO;
use App\DAO\TableroDAO;
use App\Models\Figura;
use App\Models\Figuras_Tableros;
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
    protected $figuras_tablerosDAO;

    public function __construct(){
        $this->usuarioDAO = new UsuarioDAO();
        $this->tableroDAO = new TableroDAO();
        $this->figuraDAO = new FiguraDAO();
        $this->figuras_tablerosDAO = new Figuras_TablerosDAO();
    }

    function subirImagen(Request $request){

        $imagen = $request->file('imagen');
        $imagenBinaria = file_get_contents($imagen->getRealPath());

        $figura = new Figura();
        $figura->setImagenBinario($imagenBinaria);
        $figura->setTipoimagen('png');

        $this->figuraDAO->save($figura);

        $this->actualizarFiguras();

        echo '<a href="/actualizarFiguras">Volver a administrar figuras</a>';
    }

    function actualizarFiguras(){

        $figuras = $this->figuraDAO->findAll();

        if($figuras == null){
            $figuras=[];
        }

        $imagenes = [];

        for($i = 0; $i < count($figuras); $i++){

            $imagenes[$i] = $figuras[$i]->getImagenBase64();
            //dd( $figuras[$i]->getImagenBase64());
        }

        return view('adminFigur', compact('imagenes'));
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

    function editarTablero(Request $request){

        $tableroname = $request->get('tableroName');

        session()->put('actualTablero', $tableroname);

        $imagenes = $this->getImagenesDisponibles();

        $posiciones = null;
        //$posiciones = [];

        return view('editarTablero', compact('imagenes', 'posiciones'));
    }

    function getImagenesDisponibles(){

        $figuras = $this->figuraDAO->findAll();

        if($figuras == null){
            $figuras=[];
        }

        $imagenes = [];

        for($i = 0; $i < count($figuras); $i++){
            $imagenes[$i] = $figuras[$i]->getImagenBase64();
        }

        return $imagenes;
    }

    /*function colocarFiguras(Request $request){
        $imagenes = $this->getImagenesDisponibles();
        //dd($imagenes);
        $idFigura = $request->get('figura');

        $posiciones = [];
        for($i = 0; $i<28; $i++){
            $posicion = $request->get('posicion'.$i);

            if ($posicion !== null) {
                $posiciones[$i] = (int) $posicion;
            } else {
                $posiciones[$i] = null;
            }
        }

        //dd($posiciones);

        $tableros = $this->tableroDAO->findAll();

        foreach ($tableros as $tablero){
            if($tablero->getNombre() === session()->get('actualTablero')){
                $tableroid = $tablero->getId();
                break;
            }
        }

        $posicionesTablero = $this->figuras_tablerosDAO->findByTableroId($tableroid);

        for($i = 0; $i < count($posiciones); $i++){
            if($posiciones[$i] !== null){

                foreach($posicionesTablero as $posicionEspecifica){
                    $posicion = $posicionEspecifica->getPosicion();
                    if($posicion == $posiciones[$i]){
                        $this->figuras_tablerosDAO->delete($posicionEspecifica->getId());
                    }
                }

                $figuras_tableros = new Figuras_Tableros();
                $figuras_tableros->setTablero_id($tableroid);
                $figuras_tableros->setFigura_id($idFigura);
                $figuras_tableros->setPosicion($posiciones[$i]);

                $this->figuras_tablerosDAO->save($figuras_tableros);
            }
        }

        $posiciones = $this->colocarFigurasPosicion($posiciones, $idFigura);

        return view('editarTablero', compact('posiciones', 'imagenes'));
    }

    function colocarFigurasPosicion($posiciones, $idFigura){

        for($i = 0; $i<count($posiciones); $i++){
            $figura = $this->figuraDAO->findById($idFigura);
            $figura0 = $this->figuraDAO->findById(1);

            $imagen = $figura->getImagenBase64();
            $imagen0 = $figura0->getImagenBase64();
            //dd($imagen);

            if($posiciones[$i] == null){
                $posiciones[$i] = $imagen0;
            } else {
                $posiciones[$i] = $imagen;
            }

        }

        return $posiciones;
    }*/


}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class Controller_Pr16 extends Controller
{

    public function leerFichero(){

        if (($open = fopen(storage_path() . "/Pr16_usuario.csv", "r")) !== FALSE) {

            while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
                $contenido[] = $data;
            }

            fclose($open);
            return $contenido;
        }

        return null;
    }

}

?>


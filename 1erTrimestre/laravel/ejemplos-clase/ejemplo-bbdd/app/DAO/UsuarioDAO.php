<?php

namespace App\DAO;

use App\Contracts\UsuarioContract;
use App\Models\Usuario;
use Exception;
use Illuminate\Support\Facades\DB;
use PDO;

class UsuarioDAO implements ICrud
{

    public function __construct() {}


    public function findAll(): array {
        $tablename = UsuarioContract::TABLE_NAME;

        $sql = "SELECT * FROM $tablename";

        $myPDO = DB::getPdo();
        $stmt = $myPDO->prepare($sql);
        $stmt->execute();

        $row = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $usuarios = [];

        while ($row = $stmt->fetch()) {
            $usuario = new Usuario();
            $usuario->setId($row[UsuarioContract::COL_ID])
                ->setNombre($row[UsuarioContract::COL_NOMBRE])
                ->setPassword($row[UsuarioContract::COL_PASSWORD])
                ->setRol($row[UsuarioContract::COL_ROL]);
            $usuarios[] = $usuario;
        }

        return $usuarios;
    }

    public function findById($id): object | null {

        $tablename = UsuarioContract::TABLE_NAME;
        $colid = UsuarioContract::COL_ID;

        $sql = "SELECT * FROM $tablename WHERE $colid = :id";

        $myPDO = DB::getPdo();
        $stmt = $myPDO->prepare($sql);
        $stmt->execute([':id' => $id]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $usuario = new Usuario();
            $usuario->setId($row[UsuarioContract::COL_ID])
                ->setNombre($row[UsuarioContract::COL_NOMBRE])
                ->setPassword($row[UsuarioContract::COL_PASSWORD])
                ->setRol($row[UsuarioContract::COL_ROL]);
            return $usuario;
        }

        return null;

    }

    //Que campos más tengo  que usar
    public function save($usuario): object | null {

        $myPDO = DB::getPdo();
        $tablename = UsuarioContract::TABLE_NAME;
        $colid = UsuarioContract::COL_ID;
        $colnombre = UsuarioContract::COL_NOMBRE;

        $sql =
        "INSERT INTO $tablename ( $colnombre)
         VALUES(:nombre)";

        try {
            $myPDO->beginTransaction();
            $stmt = $myPDO->prepare($sql);
            $stmt->execute(
                [
                    ':nombre' => $usuario->getNombre()

                ]
            );
            //si filasAfectadas > 0 => hubo éxito consulta
            $filasAfectadas = $stmt->rowCount();



            //forzamos un rollback aleatorio para ver que deshace los cambios
            if ($filasAfectadas > 0) {
                //obtenemos el id generado con:
                $idgenerado = $myPDO->lastInsertId();
                $usuario->setId($idgenerado);
                $myPDO->commit();
            } else {
                $myPDO->rollback();
                return null;
            }
        } catch (Exception $ex) {
            echo "ha habido una excepción se lanza rollback";
            var_dump($ex);
            $myPDO->rollback();
            return null;
        }
        $stmt = null;

        return $usuario;

    }

    //Añadir otros atributos de usuarios
    public function update($usuario): bool{

        $colid = UsuarioContract::COL_ID;
        $colnombre = UsuarioContract::COL_NOMBRE;
        $colpassword = UsuarioContract::COL_PASSWORD;
        $colrol = UsuarioContract::COL_ROL;

        $tablename = UsuarioContract::TABLE_NAME;
        $myPDO = DB::getPdo();
        if (!($usuario->getId() > 0)) {
            return false;
        }
        $sql = "UPDATE $tablename ".
               " SET $colnombre = :nombre " .
               " SET $colpassword = :password " .
               " SET $colrol = :rol " .
               " WHERE $colid = :id";


        try {
            $myPDO->beginTransaction();
            $stmt = $myPDO->prepare($sql);
            $stmt->execute(
                [
                    ':nombre' => $usuario->getNombre(),
                    ':id' => $usuario->getId(),
                    ':password' => $usuario->getPassword(),
                    ':rol' => $usuario->getRol()
                ]
            );
            //si filasAfectadas > 0 => hubo éxito consulta
            $filasAfectadas = $stmt->rowCount();

            
            if ($filasAfectadas > 0) {

                $myPDO->commit();
            } else {
                $myPDO->rollback();
                return false;
            }
        } catch (Exception $ex) {
            echo "ha habido una excepción se lanza rollback";
            var_dump($ex);
            $myPDO->rollback();
            return false;
        }
        $stmt = null;
        return true;


    }

    //Comprobar resto de atributos de usuario
    public function delete($id): bool
    {


        $myPDO = DB::getPdo();
        $tablename = UsuarioContract::TABLE_NAME;
        $colid = UsuarioContract::COL_ID;
        $sql = "DELETE FROM $tablename WHERE $colid  = :id";

        $stmt = $myPDO->prepare($sql);
        $stmt->execute([':id' => $id]);

        $filasAfectadas = $stmt->rowCount();
        return $filasAfectadas > 0;
    }



}

?>

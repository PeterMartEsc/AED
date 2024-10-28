<?php

namespace App\DAO;

use App\Contracts\FiguraContract;
use App\Contracts\RolContract;
use App\Models\Figura;
use App\Models\Rol;
use Exception;
use Illuminate\Support\Facades\DB;
use PDO;




class RolDAO implements ICrud
{


    public function __construct() {}

    public function findAll(): array
    {

        $tablename = RolContract::TABLE_NAME;

        $sql = "SELECT * FROM $tablename";

        $myPDO = DB::getPdo();
        $stmt = $myPDO->prepare($sql);
        $stmt->execute();
        $row = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $roles = [];

        while ($row = $stmt->fetch()) {
            $rol = new Rol();
            $rol->setId($row[RolContract::COL_ID])
                ->setNombre($row[RolContract::COL_NOMBRE]);
            $roles[] = $rol;
        }

        return $roles;
    }

    public function findById($id): object | null
    {

        $tablename = RolContract::TABLE_NAME;
        $colid = RolContract::COL_ID;

        $sql = "SELECT * FROM $tablename WHERE $colid = :id";

        //$myPDO = DB::getPdo();

        $myPDO = new PDO("mysql:dbname=construcciones;host=127.0.0.1;port=3306", "root", "1q2w3e4r");
        $stmt = $myPDO->prepare($sql);

        $stmt->execute([':id' => $id]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $rol = new Rol();
            $rol->setId($row[RolContract::COL_ID])
                ->setNombre($row[RolContract::COL_NOMBRE]);
            return $rol;
        }

        return null;
    }

    public function delete($id): bool
    {

        $myPDO = DB::getPdo();
        $tablename = RolContract::TABLE_NAME;
        $colid = RolContract::COL_ID;
        $sql = "DELETE FROM $tablename WHERE $colid  = :id";

        $stmt = $myPDO->prepare($sql);

        return $stmt->execute([':id' => $id]);

        $filasAfectadas = $stmt->rowCount();

        return $filasAfectadas > 0;
    }


    public function update($rol): bool
    {

        $colid = RolContract::COL_ID;
        $colnombre = RolContract::COL_NOMBRE;
        $tablename = RolContract::TABLE_NAME;
        $myPDO = DB::getPdo();
        if (!($rol->getId() > 0)) {
            return false;
        }
        $sql = "UPDATE $tablename ".
               " SET $colnombre = :nombre " .
               " WHERE $colid = :id";


        try {
            $myPDO->beginTransaction();
            $stmt = $myPDO->prepare($sql);
            $stmt->execute(
                [
                    ':nombre' => $rol->getNombre(),
                    ':id' => $rol->getId()

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

    public function save($rol): object | null
    {
        $myPDO = DB::getPdo();
        $tablename = RolContract::TABLE_NAME;
        $colid = RolContract::COL_ID;
        $colnombre = RolContract::COL_NOMBRE;

        $sql =
        "INSERT INTO $tablename ( $colnombre)
         VALUES(:nombre)";

        try {
            $myPDO->beginTransaction();
            $stmt = $myPDO->prepare($sql);
            $stmt->execute(
                [
                    ':nombre' => $rol->getNombre()

                ]
            );
            //si filasAfectadas > 0 => hubo éxito consulta
            $filasAfectadas = $stmt->rowCount();



            //forzamos un rollback aleatorio para ver que deshace los cambios
            if ($filasAfectadas > 0) {
                //obtenemos el id generado con:
                $idgenerado = $myPDO->lastInsertId();
                $rol->setId($idgenerado);
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

        return $rol;
    }
}

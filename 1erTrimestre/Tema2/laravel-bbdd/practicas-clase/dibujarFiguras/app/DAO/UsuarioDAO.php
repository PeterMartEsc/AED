<?php
namespace App\DAO;

use App\Contracts\RolContract;
use App\Contracts\TableroContract;
use App\Contracts\UsuarioContract;
use App\Models\Usuario;
use Exception;
use Illuminate\Support\Facades\DB;
use PDO;

class UsuarioDAO implements ICrud {

    public function __construct() {}

    public function findAll(): array {

        $myPDO = DB::getPdo();
        $sql = "SELECT ".
            UsuarioContract::TABLE_NAME . ".". UsuarioContract::COL_ID. ", ".
            UsuarioContract::TABLE_NAME . ".".UsuarioContract::COL_NOMBRE. ", ".
            UsuarioContract::TABLE_NAME . ".".UsuarioContract::COL_PASSWORD. ", ".
            RolContract::TABLE_NAME . ".".RolContract::COL_NOMBRE.
        " FROM " . UsuarioContract::TABLE_NAME . " INNER JOIN ". RolContract::TABLE_NAME .
         " ON " . UsuarioContract::TABLE_NAME . ".".UsuarioContract::COL_ROL . " = ". RolContract::TABLE_NAME ."." . RolContract::COL_ID ;

        // dd($sql);

         $stmt = $myPDO->prepare($sql);


        $stmt->execute();



        $usuarios = [];
        while ($row = $stmt->fetch()) {
            $usuario = new Usuario();
            $usuario->setId($row[0])
                ->setNombre($row[1])
                ->setPassword($row[2])
                ->setRol($row[3]);
            $usuarios[] = $usuario;
        }


        return $usuarios;
    }

    public function findById($id): object | null {
        $myPDO = DB::getPdo();

        $sql = "SELECT ".
            UsuarioContract::TABLE_NAME . ".". UsuarioContract::COL_ID. ", ".
            UsuarioContract::TABLE_NAME . ".".UsuarioContract::COL_NOMBRE. ", ".
            UsuarioContract::TABLE_NAME . ".".UsuarioContract::COL_PASSWORD. ", ".
            RolContract::TABLE_NAME . ".".RolContract::COL_NOMBRE.
        " FROM " . UsuarioContract::TABLE_NAME . " INNER JOIN ". RolContract::TABLE_NAME
        . " ON " . UsuarioContract::TABLE_NAME . ".".UsuarioContract::COL_ROL . " = " . RolContract::TABLE_NAME .".". RolContract::COL_ID
        . " WHERE " . UsuarioContract::TABLE_NAME . "." . UsuarioContract::COL_ID . " = :id";



        $stmt = $myPDO->prepare($sql);
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(/* PDO::FETCH_ASSOC */);
        if ($row) {
            $p = new Usuario();
            $p->setId($id)
                ->setNombre($row[1])
                ->setPassword($row[2])
                ->setRol($row[3]);
            return $p;
        }

        return null;
    }


    public function findByName($nombre): Usuario | null {
        $myPDO = DB::getPdo();
        $sqlFindName = "SELECT ".
            UsuarioContract::TABLE_NAME . ".". UsuarioContract::COL_ID. ", ".
            UsuarioContract::TABLE_NAME . ".".UsuarioContract::COL_NOMBRE. ", ".
            UsuarioContract::TABLE_NAME . ".".UsuarioContract::COL_PASSWORD. ", ".
            RolContract::TABLE_NAME . ".".RolContract::COL_NOMBRE.
        " FROM " . UsuarioContract::TABLE_NAME . " INNER JOIN ". RolContract::TABLE_NAME
        . " ON " . UsuarioContract::TABLE_NAME . ".".UsuarioContract::COL_ROL . " = " . RolContract::TABLE_NAME .".". RolContract::COL_ID
        . " WHERE " . UsuarioContract::TABLE_NAME .".".  UsuarioContract::COL_NOMBRE . " = :nombre";

        //dd($sqlFindName);

        $stmt = $myPDO->prepare($sqlFindName);
        $stmt->execute([':nombre' => $nombre]);
        $row = $stmt->fetch(/*PDO::FETCH_ASSOC*/);
        if ($row) {
            $usuario = new Usuario();
            $usuario->setId($row[0])
                ->setNombre($row[1])
                ->setPassword($row[2])
                ->setRol($row[3]);
            return $usuario;
        }

        return null;
    }


    /*public function deleteWithRel($id):bool{
        $tableroDAO =new TableroDAO();
        $tablerosDelUsuario = $tableroDAO->findByUserId($id);
        $myPDO = DB::getPdo();
        $myPDO->beginTransaction();

        foreach($tablerosDelUsuario as $tab){
            $stmtTabDel = $myPDO->prepare("DELETE FROM " . TableroContract::TABLE_NAME. " WHERE ". TableroContract::COL_ID." = :id");
            $stmtTabDel->execute([':id' => $tab->getId()]);
        }



        $stmt = $myPDO->prepare("DELETE FROM " . UsuarioContract::TABLE_NAME . " WHERE " . UsuarioContract::COL_ID . " = :id");
        $stmt->execute([':id' => $id]);
        $filasAfectadas = $stmt->rowCount();
        if($filasAfectadas > 0){
            $myPDO->commit();
            return true;
        }else{
            $myPDO->rollBack();
            return false;
        }

    }*/

    public function delete($id): bool {
        $myPDO = DB::getPdo();
        $stmt = $myPDO->prepare("DELETE FROM " . UsuarioContract::TABLE_NAME . " WHERE " . UsuarioContract::COL_ID . " = :id");
        $stmt->execute([':id' => $id]);
        $filasAfectadas = $stmt->rowCount();
        return $filasAfectadas > 0;
    }

    public function update($usuario): bool {
        $myPDO = DB::getPdo();
        if (!($usuario->getId() > 0)) {
            return false;
        }
        $sqlRolid = "SELECT * FROM " . RolContract::TABLE_NAME . " WHERE " . RolContract::COL_NOMBRE . " = :rol";


        $stmtRol = $myPDO->prepare($sqlRolid);
        $stmtRol->execute([':rol' => $usuario->getRol()]);
        $rowRol = $stmtRol->fetch(PDO::FETCH_ASSOC);

        if ($rowRol) {

            $rolId = $rowRol[RolContract::COL_ID];

        }else{
            throw new Exception("rol no encontrado");
            return false;
        }




        $sql = "UPDATE " . UsuarioContract::TABLE_NAME
        . " SET " . UsuarioContract::COL_NOMBRE . " = :nombre, "
        . UsuarioContract::COL_PASSWORD . " = :password, "
        . UsuarioContract::COL_ROL . " = :rolId "
        . " WHERE " . UsuarioContract::COL_ID . " = :id";

        try {
            $myPDO->beginTransaction();
            $stmt = $myPDO->prepare($sql);
            $stmt->execute(
                [
                    ':nombre' => $usuario->getNombre(),
                    ':password' => $usuario->getPassword(),
                    ':rolId' => $rolId,
                    ':id' => $usuario->getId()
                ]
            );
            //si filasAfectadas > 0 => hubo éxito consulta
            $filasAfectadas = $stmt->rowCount();
            echo "<br>afectadas: " . $filasAfectadas;

            //forzamos un rollback aleatorio para ver que deshace los cambios
            if ($filasAfectadas > 0) {
                $myPDO->commit();
            } else {
                $myPDO->rollback();
                return false;
            }

        } catch (Exception $ex) {

            var_dump($ex);
            $myPDO->rollback();
            return false;
        }
        $stmt = null;
        return true;
    }


    public function save($usuario): object | null {

        $myPDO = DB::getPdo();
        $tablename = UsuarioContract::TABLE_NAME;
        $colname = UsuarioContract::COL_NOMBRE;
        $colpassword = UsuarioContract::COL_PASSWORD;
        $colrol = UsuarioContract::COL_ROL;

        $roleNombre = $usuario->getRol();
        $roleDAO = new RolDAO();

        $allRoles = $roleDAO->findAll();

        $rolId = 0;
        foreach ($allRoles as $role) {
            if ($role->getNombre() === $roleNombre) {
                $rolId = $role->getId();
                break;
            }
        }

        $sql =
        "INSERT INTO $tablename ( $colname, $colpassword, $colrol)
         VALUES(:nombre, :passwd, :rol)";

        try {
            $myPDO->beginTransaction();
            $stmt = $myPDO->prepare($sql);
            $stmt->execute(
                [
                    ':nombre' => $usuario->getNombre(),
                    ':passwd' => $usuario->getPassword(),
                    ':rol' => $rolId
                ]
            );

            //si affectedRows > 0 => hubo éxito consulta
            $affectedRows = $stmt->rowCount();

            //forzamos un rollback aleatorio para ver que deshace los cambios
            if ($affectedRows > 0) {
                //obtenemos el id generado con:
                $idgenerado = $myPDO->lastInsertId();
                $usuario->setId($idgenerado);
                $myPDO->commit();
            } else {
                $myPDO->rollBack();
                return null;
            }

        } catch (Exception $ex) {
            echo "ha habido una excepción se lanza rollback";
            //var_dump($ex);
            $myPDO->rollBack();
            return null;
        }
        $stmt = null;

        return $usuario;
    }
}

<?php

namespace App\DAO;

use App\Contracts\FiguraContract;
use App\Contracts\Figuras_TablerosContract;
use App\Models\Figura;
use App\Models\Figuras_Tableros;
use Exception;
use Illuminate\Support\Facades\DB;
use PDO;




class Figuras_TablerosDAO implements ICrud
{
    public function __construct() {}

    public function findAll(): array{
        return $empry = [];
    }

    public function findById($id): object | null {
        return null;
    }

    public function delete($id) : bool {return true;}

    public function deleteByPosicion($id): bool{

        $myPDO = DB::getPdo();
        $stmt = $myPDO->prepare("DELETE FROM " . Figuras_TablerosContract::TABLE_NAME. " WHERE ". Figuras_TablerosContract::COL_POSICION." = :id");
        return $stmt->execute([':id' => $id]);
        $filasAfectadas = $stmt->rowCount();
        return $filasAfectadas > 0;

    }

    public function update($p): bool {
        return true;
    }

    public function findByTableroId($tableroId) : array | null{

        $myPDO = DB::getPdo();

        $sql = "SELECT ".
        Figuras_TablerosContract::TABLE_NAME . ".". Figuras_TablerosContract::COL_TABLERO_ID. ", ".
        Figuras_TablerosContract::TABLE_NAME . ".".Figuras_TablerosContract::COL_FIGURA_ID. ", ".
        Figuras_TablerosContract::TABLE_NAME . ".".Figuras_TablerosContract::COL_POSICION. ", ".
        " FROM " . Figuras_TablerosContract::TABLE_NAME
        . " WHERE " . Figuras_TablerosContract::TABLE_NAME . "." . Figuras_TablerosContract::COL_TABLERO_ID . " = :tablero_id";



        $stmt = $myPDO->prepare($sql);
        $stmt->execute([':tablero_id' => $tableroId]);
        $row = $stmt->fetch(/* PDO::FETCH_ASSOC */);

        $tableros = [];
        while ($row = $stmt->fetch()) {
            $p = new Figuras_Tableros();
            $p->setId($tableroId)
                ->setTablero_id($row[1])
                ->setFigura_id($row[2])
                ->setPosicion($row[3]);
            $tableros[] = $p;
        }

        return $tableros;

        //return null;
    }

    public function save($p): object | null
    {
        $myPDO = DB::getPdo();
        $tablename = Figuras_TablerosContract::TABLE_NAME;
        $coltableroid = Figuras_TablerosContract::COL_TABLERO_ID;
        $colfiguraid = Figuras_TablerosContract::COL_FIGURA_ID;
        $colposicion = Figuras_TablerosContract::COL_POSICION;
        $sql = "INSERT INTO $tablename ( $coltableroid, $colfiguraid, $colposicion)
        VALUES(:tablero_id, :figura_id, :posicion)";
        try {

            $myPDO->beginTransaction();
            //dd($sql);
            $stmt = $myPDO->prepare($sql);

            $stmt->execute(

                [
                    ':tablero_id' => $p->getTablero_id(),
                    ':figura_id' => $p->getFigura_id(),
                    ':posicion' => $p->getPosicion()

                ]
            );

            //si filasAfectadas > 0 => hubo éxito consulta
            $filasAfectadas = $stmt->rowCount();
            echo "<br>afectadas: " . $filasAfectadas;


            //forzamos un rollback aleatorio para ver que deshace los cambios
            if ($filasAfectadas > 0) {
                //obtenemos el id generado con:
                $idgenerado = $myPDO->lastInsertId();
                $p->setId($idgenerado);
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

        return $p;
    }
}

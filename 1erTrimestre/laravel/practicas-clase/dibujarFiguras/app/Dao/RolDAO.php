<?php

namespace App\Dao;

use App\Dao\ICrudDao;
use Illuminate\Support\Facades\DB;
use PDO;

class Rol {
    private string $nombre;
    private int $id;



    /**
     * Get the value of nombre
     *
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @param string $nombre
     *
     * @return self
     */
    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
}

class RolDAO implements ICrudDao{

    public function __construct(){
    }

    public function findAll(){

        $myPDO = DB::getPdo();

        // FETCH_ASSOC
        $stmt = $myPDO->prepare("SELECT * FROM roles");
        $stmt->setFetchMode(PDO::FETCH_ASSOC); //devuelve array asociativo
        $stmt->execute(); // Ejecutamos la sentencia
        $roles = [];

        while ($row = $stmt->fetch()){
            $p = new Rol();
            $p->setId($row["id"])
                ->setNombre($row["nombre"]);

            $roles[] = $p;
        }

        return $roles;
    }

    public function save($dao){

    }
    public function findById($id){

    }
    public function update($dao){

    }
    public function delete($id){

    }
}

?>

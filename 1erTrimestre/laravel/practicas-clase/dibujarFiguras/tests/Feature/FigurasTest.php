<?php

namespace Tests\Feature;

use App\DAO\RolDAO;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\assertTrue;

class FigurasTest extends TestCase
{
    public $databaseCreated = false;

    public function setUp(): void{

        parent::setUp();
        if(! $this->databaseCreated ){
            $pdo = DB::getPdo();
            require 'CreateDatabase.php';
            $this->databaseCreated = true;
        }
    }

    public function test_1_findAllRoles(): void {
        $pdo = DB::getPdo();
        $rolDAO = new RolDAO($pdo);
        $roles = $rolDAO->findAll();
        assertTrue(count($roles) == 2);
    }
}

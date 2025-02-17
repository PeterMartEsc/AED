<?php

namespace App\Models;

interface IUserService{
    public function findById(string $id);
    public function save(User $user);
}

<?php

namespace App\Http\Controllers;

use App\Models\IUserService;
use App\Models\User;

class UserService implements IUserService
{
    /**
     * Display a listing of the resource.
     */
    public function findById(string $id)
    {
        return "yepaaaa ".$id;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function save(User $user)
    {
        User::updateOrCreate()(
            ['id' => $user->id],
            ['name' => $user->name]
        );
    }
}

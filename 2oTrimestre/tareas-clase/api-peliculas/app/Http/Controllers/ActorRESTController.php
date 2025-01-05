<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;
use App\Http\Resources\ActorDTO;

class ActorRESTController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ActorDTO::collection(Actor::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $actor = ActorDTO::create([
            'id' => $request->id,
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos
            ]);

        return new ActorDTO($actor);
    }

    /**
     * Display the specified resource.
     */
    public function show(Actor $actor)
    {
        return new ActorDTO($actor);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Actor $actor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Actor $actor)
    {
        $actor->update($request->only(['nombre', 'apellidos']));
        return new ActorDTO($actor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Actor $actor)
    {
        $actor->delete();
        return response()->json(null, 204);
    }
}

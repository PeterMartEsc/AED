<?php

namespace App\Http\Controllers;

use App\Http\Resources\DirectorDTO;
use App\Models\Director;
use Illuminate\Http\Request;

class DirectorRESTController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return DirectorDTO::collection(Director::all());
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
        $director = Director::create([
            'id' => $request->id,
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos
            ]);

        return new DirectorDTO($director);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $director = Director::find($id);

        if (!$director) {
            return response()->json(['error' => 'No se ha encontrado el director'], 404);
        }

        return new DirectorDTO($director);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Director $director)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Director $director)
    {
        $director->update($request->only(['nombre', 'apellidos']));
        return new DirectorDTO($director);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $director = Director::find($id);
        if (!$director) {
            return response()->json(['error' => 'No se ha encontrado el director'], 404);
        } else {
            $director->delete();
            return response()->json(null, 204);
        }
    }
}

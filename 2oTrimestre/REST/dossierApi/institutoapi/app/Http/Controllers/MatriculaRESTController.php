<?php

namespace App\Http\Controllers;

use App\Http\Resources\MatriculaDTO;
use App\Models\Matricula;
use Illuminate\Http\Request;

class MatriculaRESTController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*return response()->json([
            'saludo' => 'Hola soy Pedro',
            ]);*/

        return MatriculaDTO::collection(Matricula::all());
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
        $matricula = MatriculaDTO::create([
            'id_matricula' => $request->id,
            'dni' => $request->dni,
            'year' => $request->year,
            'asignaturas' => $request->asignaturas
            ]);
        return new MatriculaDTO($matricula);
    }

    /**
     * Display the specified resource.
     */
    public function show(Matricula $matricula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matricula $matricula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matricula $matricula)
    {
        $matricula->update($request->only(['dni', 'year']));
        $matricula->asignaturas()->detach();

        if($request->has('asignaturas')){
            foreach($request->asinignaturas as $asignaturaid){
                //$matricula->asignaturas()->
            }
        }
        return new MatriculaDTO($matricula);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matricula $matricula)
    {
        $matricula->delete();
        return response()->json(null, 204);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Resources\AlumnoDTO;
use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoRESTController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return AlumnoDTO::collection(Alumno::all());
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
        $alumno = AlumnoDTO::create([
            'id_alumno' => $request->id_alumno,
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'fechanacimiento' => strtotime($request->input('fechanacimiento')),
            ]);
        return new AlumnoDTO($alumno);
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $alumno)
    {
        $alumno->update($request->only(['nombre', 'apellidos', 'fechanacimiento']));
        return new AlumnoDTO($alumno);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return response()->json(null, 204);
    }
}

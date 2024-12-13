<?php

namespace App\Http\Controllers;

use App\Http\Resources\AlumnoDTO;
use App\Models\Alumno;
use Illuminate\Http\Request;

/**
 *  @OA\Info(
 *      title="Instituto api",
 *      version="1.0.0",
 *      description="Esta es la documentación de la API generada automáticamente con Swagger",
 *      @OA\Contact(
 *          email="soporte@example.com"
 *      )
 *  )
 */
class AlumnoRESTController extends Controller
{
    /**
    *
    * @OA\Get(
    *   path="/api/alumnos",
    *   summary="Obtener lista de alumnos",
    *   description="Retorna una lista de alumnos",
    *   tags={"Alumnos"},
    *   @OA\Response(
    *       response=200,
    *       description="Lista de alumnos"
    *   )
    * )
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
    *
    * @OA\Post(
    *   path="/api/alumnos",
    *   summary="Crear un alumno",
    *   description="Crea un alumno",
    *   tags={"Alumnos"},
    *   @OA\Response(
    *       response=200,
    *       description="Crear alumno"
    *   )
    * )
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
    *
    * @OA\Put(
    *   path="/api/alumnos/{alumno}",
    *   summary="Actualiza un alumno",
    *   description="Actualiza un alumno",
    *   tags={"Pedro"},
    *   @OA\Response(
    *       response=200,
    *       description="Edita alumno existente sustituyendo al completo"
    *   )
    * )
    */
    public function update(Request $request, Alumno $alumno)
    {
        $alumno->update($request->only(['nombre', 'apellidos', 'fechanacimiento']));
        return new AlumnoDTO($alumno);
    }

    /**
    *
    * @OA\Delete(
    *   path="/api/alumnos/{alumno}",
    *   summary="Elimina un alumno",
    *   description="Elimina un alumno",
    *   tags={"Alumnos"},
    *   @OA\Response(
    *       response=200,
    *       description="Edita alumno existente sustituyendo info"
    *   )
    * )
    */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return response()->json(null, 204);
    }
}

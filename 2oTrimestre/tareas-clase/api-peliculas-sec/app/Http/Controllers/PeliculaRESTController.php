<?php

namespace App\Http\Controllers;

use App\Http\Resources\PeliculaDTO;
use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaRESTController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PeliculaDTO::collection(Pelicula::all());
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
        //La variable data no se usa, pero sirve para comprobar que los datos son correctos
        $data = $request->validate([
            'titulo' => 'string|max:50',
            'year' => 'integer|between:1900,' . date('Y'),
            'descripcion' => 'string|max:255',
            'caratula' => 'file|mimes:jpg,png',
            'trailer' => 'string|max:255',
            'actores' => 'array', // Check de que se envíe un array de actores
            'categorias' => 'array', // Check de que se envíe un array de categorías
            'directores' => 'array', // Check de que se envíe un array de directores

        ]);

        

        $pelicula = Pelicula::create([
                'id' => $request->id,
                'titulo' => $request->titulo,
                'year' => $request->year,
                'descripcion' => $request->descripcion,
                'caratula' => $request->caratula,
                'trailer' => $request->trailer,
            ]);

        $pelicula->actoresPeliculas()->sync($request->input('actores'));
        $pelicula->categoriasPeliculas()->sync($request->input('categorias'));
        $pelicula->directoresPeliculas()->sync($request->input('directores'));

        return new PeliculaDTO($pelicula);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pelicula = Pelicula::find($id);

        if (!$pelicula) {
            return response()->json(['error' => 'No se ha encontrado la pelicula'], 404);
        }

        return new PeliculaDTO($pelicula);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelicula $pelicula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pelicula = Pelicula::find($id);

        //La variable data no se usa, pero sirve para comprobar que los datos son correctos
        $data = $request->validate([
            'titulo' => 'string|max:50',
            'year' => 'integer|between:1900,' . date('Y'),
            'descripcion' => 'string|max:255',
            'caratula' => 'string|max:255',
            'trailer' => 'string|max:255',
            'actores' => 'array', // Check de que se envíe un array de actores
            'categorias' => 'array', // Check de que se envíe un array de categorías
            'directores' => 'array', // Check de que se envíe un array de directores

        ]);

        // Actualizar los datos de la película
        $pelicula->update($request->only(['titulo', 'year', 'descripcion', 'caratula', 'trailer']));

        // Actualizar la relación con los actores | categorias | directores
        if ($request->has('actores')) {
            //Llama al metodo del belongsTo con un sync para obtener los actores
            $pelicula->actoresPeliculas()->sync($request->input('actores'));
        }

        if ($request->has('categorias')) {
            //Llama al metodo del belongsTo con un sync para obtener las categorias
            $pelicula->categoriasPeliculas()->sync($request->input('categorias'));
        }

        if ($request->has('directores')) {
            //Llama al metodo del belongsTo con un sync para obtener los directores
            $pelicula->directoresPeliculas()->sync($request->input('directores'));
        }

        // Cargar los actores, categorías y directores en el objeto de la pelicula
        $peliculaActualizada = $pelicula->load('actoresPeliculas', 'categoriasPeliculas', 'directoresPeliculas');

        // Retornar la película actualizada como recurso
        return new PeliculaDTO($peliculaActualizada);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pelicula = Pelicula::find($id);

        if (!$pelicula) {
            return response()->json(['error' => 'No se ha encontrado la pelicula'], 404);
        } else {
            $pelicula->delete();
            return response()->json(null, 204);
        }
    }
}

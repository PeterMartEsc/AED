<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoriaDTO;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaRESTController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CategoriaDTO::collection(Categoria::all());
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
        $categoria = CategoriaDTO::create([
            'id' => $request->id,
            'nombre' => $request->nombre
            ]);

        return new CategoriaDTO($categoria);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        return new CategoriaDTO($categoria);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        $categoria->update($request->only(['nombre']));
        return new CategoriaDTO($categoria);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return response()->json(null, 204);
    }
}

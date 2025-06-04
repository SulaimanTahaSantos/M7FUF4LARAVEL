<?php

namespace App\Http\Controllers;

use App\Models\LenguajesDeProgramacion;
use Illuminate\Http\Request;

class LenguajesDeProgramacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lenguajes = LenguajesDeProgramacion::all();
        return view('lenguajesdeprogramacion.index', compact('lenguajes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lenguajesdeprogramacion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'creador' => 'required|string|max:255',
            'fecha_lanzamiento' => 'required|date',
            'tipo' => 'required|string|max:255',
            'url' => 'nullable|string|max:255'
        ]);

        LenguajesDeProgramacion::create($request->all());

        return redirect()->route('lenguajesdeprogramacion.index')->with('success', 'Lenguaje de programación creado correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(LenguajesDeProgramacion $lenguajesDeProgramacion)
    {
        return view('lenguajesdeprogramacion.show', compact('lenguajesDeProgramacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LenguajesDeProgramacion $lenguajesDeProgramacion)
    {
        return view('lenguajesdeprogramacion.edit', compact('lenguajesDeProgramacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LenguajesDeProgramacion $lenguajesDeProgramacion)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'creador' => 'required|string|max:255',
            'fecha_lanzamiento' => 'required|date',
            'tipo' => 'required|string|max:255',
            'url' => 'nullable|string|max:255'
        ]);

        $lenguajesDeProgramacion->update($request->all());

        return redirect()->route('lenguajesdeprogramacion.index')->with('success', 'Lenguaje de programación actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LenguajesDeProgramacion $lenguajesDeProgramacion)
    {
        $lenguajesDeProgramacion->delete();
        return redirect()->route('lenguajesdeprogramacion.index')->with('success', 'Lenguaje de programación eliminado correctamente!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Titan;
use Illuminate\Http\Request;

class TitanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titanes = Titan::all();
        return view('titanes.index', compact('titanes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('titanes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'portador' => 'required|string|max:255',
            'altura' => 'required|numeric|min:0|max:999.99',
            'habilidades' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'imagen_url' => 'nullable|string|max:255'
        ]);

        Titan::create($request->all());

        return redirect()->route('titanes.index')->with('success', 'Titán creado correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Titan $titane)
    {
        return view('titanes.show', compact('titane'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Titan $titane)
    {
        return view('titanes.edit', compact('titane'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Titan $titane)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'portador' => 'required|string|max:255',
            'altura' => 'required|numeric|min:0|max:999.99',
            'habilidades' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'imagen_url' => 'nullable|string|max:255'
        ]);

        $titane->update($request->all());

        return redirect()->route('titanes.index')->with('success', 'Titán actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Titan $titane)
    {
        $titane->delete();
        return redirect()->route('titanes.index')->with('success', 'Titán eliminado correctamente!');
    }
}

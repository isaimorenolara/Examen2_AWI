<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BibliotecarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::all();
        return view('bibliotecario.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bibliotecario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'cantidad_disponible' => 'required|integer',
        ]);

        Libro::create([
            'titulo' => $validated['titulo'],
            'autor' => $validated['autor'],
            'cantidad_disponible' => $validated['cantidad_disponible'],
            'bibliotecario_id' => Auth::user()->id,
        ]);

        return redirect()->route('bibliotecario.index')->with('success', 'Libro añadido exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $libro = Libro::findOrFail($id);
    
        return view('bibliotecario.edit', compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'cantidad_disponible' => 'required|integer|min:0',
        ]);
    
        $libro = Libro::findOrFail($id);
    
        $libro->update([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'cantidad_disponible' => $request->cantidad_disponible,
        ]);
    
        return redirect()->route('bibliotecario.index')->with('success', 'Libro actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

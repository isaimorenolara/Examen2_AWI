<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Prestamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrestamoController extends Controller
{
    public function index()
    {
        $libros = Libro::where('cantidad_disponible', '>', 0)->get();
        return view('miembro.prestamos.index', compact('libros'));
    }

    public function listarPrestamos()
    {
        $prestamos = Prestamo::with('libro', 'user')->get();

        return view('bibliotecario.prestamos.index', compact('prestamos'));
    }

    public function solicitarPrestamo($libro_id)
    {
        $libro = Libro::findOrFail($libro_id);

        if ($libro->cantidad_disponible > 0) {
            Prestamo::create([
                'user_id' => Auth::id(),
                'libro_id' => $libro->id,
                'fecha_prestamo' => now(),
            ]);

            $libro->cantidad_disponible -= 1;
            $libro->save();

            return redirect()->route('prestamos.misPrestamos')->with('success', 'Préstamo solicitado con éxito.');
        }

        return back()->with('error', 'No hay suficientes ejemplares disponibles.');
    }

    public function misPrestamos()
    {
        $prestamos = Prestamo::where('user_id', Auth::id())->with('libro')->get();
        return view('miembro.prestamos.misPrestamos', compact('prestamos'));
    }

    public function actualizarEstado(Request $request, $id)
    {
        $prestamo = Prestamo::findOrFail($id);
    
        $estadoAnterior = $prestamo->estado;
    
        $prestamo->estado = $request->estado;
        $prestamo->fecha_devolucion = $request->estado === 'devuelto' ? now() : null;
        $prestamo->save();
    
        $libro = $prestamo->libro;
    
        if ($estadoAnterior === 'devuelto' && $request->estado === 'pendiente') {
            $libro->cantidad_disponible -= 1;
            $libro->save();
        }
    
        if ($request->estado === 'devuelto') {
            $libro->cantidad_disponible += 1;
            $libro->save();
        }
    
        return redirect()->route('bibliotecario-prestamos')->with('success', 'Estado del préstamo actualizado correctamente.');
    }
}
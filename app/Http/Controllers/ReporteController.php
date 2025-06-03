<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reporte;
use Illuminate\Support\Facades\Storage;

class ReporteController extends Controller
{
    // Mostrar todos los reportes en la vista 'home'
    public function index()
    {
        $reportes = Reporte::latest()->get();
        return view('home', compact('reportes'));
    }

    // Mostrar el formulario de reporte
    public function create()
    {
        return view('reporte');
    }

    // Guardar un nuevo reporte en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'ubicacion' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $ruta = null;

        if ($request->hasFile('foto')) {
            $ruta = $request->file('foto')->store('fotos', 'public');
        }

        Reporte::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'ubicacion' => $request->ubicacion,
            'foto' => $ruta,  // Puede ser null
        ]);

        return redirect()->back()->with('success', 'Reporte enviado correctamente');
    }

    // Borrar todos los reportes y sus fotos del storage
    public function borrarTodo()
    {
        $reportes = Reporte::all();

        foreach ($reportes as $reporte) {
            if ($reporte->foto) {
                Storage::delete('public/' . $reporte->foto);
            }
        }

        Reporte::truncate();

        return redirect()->route('home')->with('status', 'Todos los reportes y fotos han sido eliminados.');
    }

    public function destroy($id)
{
    $reporte = Reporte::findOrFail($id);

    if ($reporte->foto) {
        Storage::delete('public/' . $reporte->foto);
    }

    $reporte->delete();

    return redirect()->route('home')->with('status', 'Reporte eliminado correctamente.');
}

}

<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Models\Pais;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    public function index(Request $request)
    {
        $query = Ciudad::with('pais');

        if ($request->filled('buscar')) {
            $query->where('nombre', 'like', '%'.$request->buscar.'%');
        }

        if ($request->filled('sort')) {
            $col = $request->sort === 'pais' ? 'id_pais' : $request->sort;
            $query->orderBy($col, $request->direction ?? 'asc');
        }

        $ciudades = $query->get();
        return view('ciudades.index', compact('ciudades'));
    }
    
    public function create()
    {
        $paises = Pais::all();
        return view('ciudades.create', compact('paises'));
    }

    public function store(Request $request)
    {
        $request->validate([
        'nombre' => 'required',
        'estado' => 'required',
        'id_pais' => 'required|exists:paises,id_pais',
    ]);

        Ciudad::create([
            'nombre' => $request->nombre,
            'estado' => $request->estado,
            'id_pais' => $request->id_pais,
        ]);

        return redirect()->route('ciudades.index')->with('success', 'Ciudad creada correctamente.');
    }

    public function edit(Ciudad $ciudad)
    {
        $paises = Pais::all();
        return view('ciudades.edit', compact('ciudad', 'paises'));
    }

    public function update(Request $request, Ciudad $ciudad)
    {
        $request->validate([
        'nombre' => 'required',
        'estado' => 'required',
        'id_pais' => 'required|exists:paises,id_pais', 
    ]);


        $ciudad->update([
            'nombre' => $request->nombre,
            'estado' => $request->estado,
            'id_pais' => $request->id_pais,
        ]);

        return redirect()->route('ciudades.index')->with('success', 'Ciudad actualizada.');
    }

    public function destroy(Ciudad $ciudad)
    {
        $ciudad->delete();
        return redirect()->route('ciudades.index')->with('success', 'Ciudad eliminada.');
    }

    public function crearPais()
    {
        return view('ciudades.create2');
    }

    public function guardarPais(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100|unique:paises,nombre',
        ]);

        Pais::create([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('ciudades.index')->with('success', 'País creado correctamente.');
    }

    public function formAgregarImagen($id)
    {
        $ciudad = Ciudad::findOrFail($id);
        return view('ciudades.agregar_imagen', compact('ciudad'));
    }

    public function guardarImagen(Request $request, $id)
    {
        $request->validate([
            'imagen' => 'required|image|max:2048', // valida que sea imagen y no muy grande
        ]);

        $ciudad = Ciudad::findOrFail($id);

        if($request->hasFile('imagen')) {
            $archivo = $request->file('imagen');
            $nombreArchivo = time().'_'.$archivo->getClientOriginalName();
            $archivo->move(public_path('imagenes_ciudades'), $nombreArchivo);
            $ciudad->imagen = $nombreArchivo;
            $ciudad->save();
        }

        return redirect()->route('ciudades.index')->with('success', 'Imagen agregada correctamente');
    }

}
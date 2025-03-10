<?php
namespace App\Http\Controllers;

use App\Models\Hoteles;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hoteles = Hoteles::all();
        return view('hoteles.index', compact('hoteles'));
    }

    public function create()
    {
        return view('hoteles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'direccion' => 'nullable|string|max:255',
            'ciudad' => 'nullable|string|max:100',
            'estado' => 'nullable|string|max:100',
            'telefono' => 'nullable|string|max:20',
        ]);

        Hoteles::create($request->all());

        return redirect()->route('hoteles.index')->with('success', 'Hotel creado exitosamente.');
    }

    public function show($id)
    {
        $hotel = Hoteles::findOrFail($id);
        return view('hoteles.show', compact('hotel'));
    }

    public function edit($id)
    {
        $hotel = Hoteles::findOrFail($id);
        return view('hoteles.edit', compact('hotel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'direccion' => 'nullable|string|max:255',
            'ciudad' => 'nullable|string|max:100',
            'estado' => 'nullable|string|max:100',
            'telefono' => 'nullable|string|max:20',
        ]);

        $hotel = Hoteles::findOrFail($id);
        $hotel->update($request->all());

        return redirect()->route('hoteles.index')->with('success', 'Hotel actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $hotel = Hoteles::findOrFail($id);
        $hotel->delete();

        return redirect()->route('hoteles.index')->with('success', 'Hotel eliminado exitosamente.');
    }
}

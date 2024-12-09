<?php

namespace App\Http\Controllers;

use App\Models\Promociones;
use Illuminate\Http\Request;

class PromocionesController extends Controller
{
    
    public function index()
    {
        $promociones = Promociones::all();
        return view('Promociones.Index_Promociones', compact('promociones'));
    }


    public function create()
    {
        return view('Promociones.Create_Promociones');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|in:Descuento,2x1,Cashback,Envío gratis,Otro',
            'fecha_inicio' => 'required|date|before:fecha_fin',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'descripcion' => 'required|string|max:500',
            'codigo_promocional' => 'required|string|max:20|unique:promociones,codigo_promocional',
            'descuento' => 'nullable|numeric|min:0',
            'activo' => 'required|boolean',
        ], [
            'nombre.required' => 'El nombre de la promoción es obligatorio.',
            'nombre.string' => 'El nombre de la promoción debe ser una cadena de texto.',
            'nombre.max' => 'El nombre de la promoción no puede tener más de 255 caracteres.',
            'tipo.required' => 'El tipo de promoción es obligatorio.',
            'tipo.in' => 'El tipo de promoción debe ser uno de los siguientes: descuento, 2x1, cashback, envío gratis, otro.',
            'fecha_inicio.required' => 'La fecha de inicio es obligatoria.',
            'fecha_inicio.date' => 'La fecha de inicio debe ser una fecha válida.',
            'fecha_inicio.before' => 'La fecha de inicio debe ser antes de la fecha de fin.',
            'fecha_fin.required' => 'La fecha de fin es obligatoria.',
            'fecha_fin.date' => 'La fecha de fin debe ser una fecha válida.',
            'fecha_fin.after' => 'La fecha de fin debe ser después de la fecha de inicio.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.string' => 'La descripción debe ser una cadena de texto.',
            'descripcion.max' => 'La descripción no puede tener más de 500 caracteres.',
            'codigo_promocional.required' => 'El código promocional es obligatorio.',
            'codigo_promocional.string' => 'El código promocional debe ser una cadena de texto.',
            'codigo_promocional.max' => 'El código promocional no puede tener más de 20 caracteres.',
            'codigo_promocional.unique' => 'El código promocional ya ha sido utilizado.',
            'descuento.numeric' => 'El descuento debe ser un valor numérico.',
            'descuento.min' => 'El descuento debe ser un valor positivo o cero.',
            'activo.required' => 'El estado de la promoción (activo) es obligatorio.',
            'activo.boolean' => 'El estado de la promoción (activo) debe ser verdadero o falso.',
        ]);
        

        Promociones::create($request->all());

        return redirect()->route('promociones.index')->with('success', 'Promoción creada con éxito.');
    }


    public function edit($id)
{
    $promocion = Promociones::findOrFail($id);
    return view('Promociones.Edit_Promociones', compact('promocion'));
}



    public function update(Request $request, Promociones $promocion)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|in:Descuento,2x1,Cashback,Envío gratis,Otro',
            'fecha_inicio' => 'required|date|before:fecha_fin',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'descripcion' => 'required|string|max:500',
            'codigo_promocional' => 'required|string|max:20|unique:promociones,codigo_promocional,' . $promocion->id,
            'descuento' => 'nullable|numeric|min:0',
            'activo' => 'required|boolean',
        ], [
            'nombre.required' => 'El nombre de la promoción es obligatorio.',
            'nombre.string' => 'El nombre de la promoción debe ser una cadena de texto.',
            'nombre.max' => 'El nombre de la promoción no puede tener más de 255 caracteres.',
            'tipo.required' => 'El tipo de promoción es obligatorio.',
            'tipo.in' => 'El tipo de promoción debe ser uno de los siguientes: descuento, 2x1, cashback, envío gratis, otro.',
            'fecha_inicio.required' => 'La fecha de inicio es obligatoria.',
            'fecha_inicio.date' => 'La fecha de inicio debe ser una fecha válida.',
            'fecha_inicio.before' => 'La fecha de inicio debe ser antes de la fecha de fin.',
            'fecha_fin.required' => 'La fecha de fin es obligatoria.',
            'fecha_fin.date' => 'La fecha de fin debe ser una fecha válida.',
            'fecha_fin.after' => 'La fecha de fin debe ser después de la fecha de inicio.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.string' => 'La descripción debe ser una cadena de texto.',
            'descripcion.max' => 'La descripción no puede tener más de 500 caracteres.',
            'codigo_promocional.required' => 'El código promocional es obligatorio.',
            'codigo_promocional.string' => 'El código promocional debe ser una cadena de texto.',
            'codigo_promocional.max' => 'El código promocional no puede tener más de 20 caracteres.',
            'codigo_promocional.unique' => 'El código promocional ya ha sido utilizado.',
            'descuento.numeric' => 'El descuento debe ser un valor numérico.',
            'descuento.min' => 'El descuento debe ser un valor positivo o cero.',
            'activo.required' => 'El estado de la promoción (activo) es obligatorio.',
            'activo.boolean' => 'El estado de la promoción (activo) debe ser verdadero o falso.',
        ]);
        

        $promocion->update($request->all());

        return redirect()->route('promociones.index')->with('success', 'Promoción actualizada con éxito.');
    }

    
    public function destroy(Promociones $promocion)
    {
        $promocion->delete();

        return redirect()->route('promociones.index')->with('success', 'Promoción eliminada con éxito.');
    }
}

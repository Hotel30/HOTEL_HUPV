<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Habitacion;
class OcupacionController extends Controller
{
    public function indexhabitaciones(Request $request)
{
    $pisoSeleccionado = $request->get('piso', null); 
    
    $habitacionesQuery = Habitacion::select('id', 'hotel_id', 'tipo_habitacion_id', 'numero_habitacion', 'tarifa', 'estado', 'piso')
        ->orderBy('hotel_id');

    
    if ($pisoSeleccionado) {
        $habitacionesQuery->where('piso', $pisoSeleccionado);
    }

    $habitacionesPorHotel = $habitacionesQuery->get()->groupBy('hotel_id');

    return view('Ocupacion.index', compact('habitacionesPorHotel', 'pisoSeleccionado'));
}

}
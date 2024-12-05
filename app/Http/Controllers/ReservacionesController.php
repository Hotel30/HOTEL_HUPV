<?php
namespace App\Http\Controllers;

use App\Models\Reservacion;
use App\Models\Hoteles;
use App\Models\Habitacion;
use App\Models\Inventario;
use App\Models\Promociones;
use Illuminate\Http\Request;

class ReservacionesController extends Controller
{
    /**
     * Mostrar el formulario de creación de una reservación.
     */
    public function create()
    {
        $hoteles = Hoteles::all(); // Lista de hoteles disponibles
        $inventarios = Inventario::all(); // Artículos disponibles
        return view('Modulo_reservaciones.create', compact('hoteles', 'inventarios'));
    }

    /**
     * Almacenar una nueva reservación.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:users,id',
            'hotel_id' => 'required|exists:hoteles,id',
            'tipo_reservacion' => 'required|in:individual,grupal',
            'fecha_entrada' => 'required|date|after_or_equal:today',
            'fecha_salida' => 'required|date|after:fecha_entrada',
            'habitaciones' => 'required|array',
            'habitaciones.*' => 'exists:habitaciones,id',
            'codigo_promocional' => 'nullable|string|max:50',
            'articulos' => 'nullable|array',
            'articulos.*.id' => 'exists:inventario,id_producto',
            'articulos.*.cantidad' => 'integer|min:1',
            'notas' => 'nullable|string',
        ]);

        // Obtener datos generales
        $cliente_id = $request->cliente_id;
        $hotel_id = $request->hotel_id;
        $tipo_reservacion = $request->tipo_reservacion;
        $fecha_entrada = $request->fecha_entrada;
        $fecha_salida = $request->fecha_salida;
        $habitaciones = $request->habitaciones;
        $codigo_promocional = $request->codigo_promocional;
        $articulos = $request->articulos;
        $notas = $request->notas;

        // Calcular noches
        $noches = (new \DateTime($fecha_entrada))->diff(new \DateTime($fecha_salida))->days;

        // Calcular monto de habitaciones
        $monto_habitaciones = Habitacion::whereIn('id', $habitaciones)->sum('tarifa') * $noches;

        // Validar promoción
        $descuento_aplicado = 0;
        if ($codigo_promocional) {
            $promocion = Promociones::where('codigo_promocional', $codigo_promocional)
                ->where('activo', true)
                ->whereDate('fecha_inicio', '<=', $fecha_entrada)
                ->whereDate('fecha_fin', '>=', $fecha_entrada)
                ->first();

            if ($promocion) {
                $descuento_aplicado = $promocion->descuento;
            }
        }

        // Aplicar descuento
        $monto_total = $monto_habitaciones - ($monto_habitaciones * $descuento_aplicado / 100);

        // Calcular monto por artículos
        $monto_articulos = 0;
        if ($articulos) {
            foreach ($articulos as $articulo) {
                $inventario = Inventario::find($articulo['id']);
                $monto_articulos += $inventario->precio * $articulo['cantidad'];
            }
        }

        // Sumar artículos al total
        $monto_total += $monto_articulos;

        // Crear la reservación
        $reservacion = Reservacion::create([
            'cliente_id' => $cliente_id,
            'hotel_id' => $hotel_id,
            'tipo_reservacion' => $tipo_reservacion,
            'fecha_entrada' => $fecha_entrada,
            'fecha_salida' => $fecha_salida,
            'noches' => $noches,
            'monto_total' => $monto_total,
            'codigo_promocional' => $codigo_promocional,
            'descuento_aplicado' => $descuento_aplicado,
            'notas' => $notas,
            'metodo_pago' => 'paypal',
        ]);

        // Asignar habitaciones a la reservación
        foreach ($habitaciones as $habitacion_id) {
            $habitacion = Habitacion::find($habitacion_id);
            $reservacion->habitaciones()->create([
                'habitacion_id' => $habitacion->id,
                'tarifa' => $habitacion->tarifa,
            ]);
        }

        // Asignar artículos a la reservación
        if ($articulos) {
            foreach ($articulos as $articulo) {
                $inventario = Inventario::find($articulo['id']);
                $reservacion->inventarios()->create([
                    'inventario_id' => $inventario->id_producto,
                    'cantidad' => $articulo['cantidad'],
                    'precio_unitario' => $inventario->precio,
                    'subtotal' => $inventario->precio * $articulo['cantidad'],
                ]);
            }
        }

        return redirect()->route('reservaciones.show', $reservacion->id)->with('success', 'Reservación creada exitosamente.');
    }

    /**
     * Mostrar una reservación específica.
     */
    public function show($id)
    {
        $reservacion = Reservacion::with(['cliente', 'hotel', 'habitaciones', 'inventarios'])->findOrFail($id);
        return view('Modulo_Reservaciones.show', compact('reservacion'));
    }

    
}

@extends('layouts.app')

@section('main.content')
<div class="main-content">
<h1>Detalles de la Reservación</h1>

<h3>Cliente</h3>
<p><strong>Nombre:</strong> {{ $reservacion->nombre }}</p>
<p><strong>Teléfono:</strong> {{ $reservacion->telefono }}</p>
<p><strong>Email:</strong> {{ $reservacion->email }}</p>
<p><strong>Dirección:</strong> {{ $reservacion->direccion }}</p>

<h3>Hotel</h3>
<p>{{ $reservacion->hotel->nombre }}</p>

<h3>Detalles de la Estancia</h3>
<p><strong>Fecha de Entrada:</strong> {{ $reservacion->fecha_entrada }}</p>
<p><strong>Fecha de Salida:</strong> {{ $reservacion->fecha_salida }}</p>
<p><strong>Noches:</strong> {{ $reservacion->noches }}</p>
<p><strong>Código Promocional:</strong> {{ $reservacion->codigo_promocional ?? 'Ninguno' }}</p>
<p><strong>Monto Total:</strong> ${{ $reservacion->monto_total }}</p>
<p><strong>Descuento aplicado:</strong> ${{ $reservacion->descuento_aplicado ?? 'Sin '}}</p>
<p><strong>Notas:</strong> {{ $reservacion->notas ?? 'Sin notas adicionales' }}</p>
<p><strong>Método de Pago:</strong> {{ $reservacion->metodo_pago}}</p>

<h3>Habitaciones Reservadas</h3>
<ul>
    @forelse ($reservacion->habitaciones as $habitacion)
        <li>
            <strong>Habitación:</strong> {{ $habitacion->numero_habitacion }} 
            ({{ $habitacion->tipo_habitacion_id == 1 ? 'Individual' : ($habitacion->tipo_habitacion_id == 2 ? 'Doble' : ($habitacion->tipo_habitacion_id == 3 ? 'Suite' : ($habitacion->tipo_habitacion_id == 4 ? 'Suite Presidencial' : 'Familiar'))) }}) 
            - Tarifa: ${{ $habitacion->pivot->tarifa }}
        </li>
    @empty
        <li>No hay habitaciones reservadas para esta reservación.</li>
    @endforelse
</ul>

@endsection

@extends('layouts.app')
@section('head.content')
    <title>Crear Habitación</title>
    <link rel="stylesheet" href="{{ asset('/css/anadir.css') }}">
@endsection

@section('main.content')
<div class="main-content">
    <h2>Detalles de la Reservación</h2>
    
    <div class="section-container">
        <h3 class="section-title">Cliente</h3>
        <p><strong>Nombre:</strong> {{ $reservacion->nombre }}</p>
        <p><strong>Teléfono:</strong> {{ $reservacion->telefono }}</p>
        <p><strong>Email:</strong> {{ $reservacion->email }}</p>
        <p><strong>Dirección:</strong> {{ $reservacion->direccion }}</p>
    </div>

    <div class="section-container">
        <h3 class="section-title">{{ $reservacion->hotel->nombre }}</h3>
    </div>

    <div class="section-container">
        <h3 class="section-title">Detalles de la Estancia</h3>
        <p><strong>Fecha de Entrada:</strong> {{ $reservacion->fecha_entrada }}</p>
        <p><strong>Fecha de Salida:</strong> {{ $reservacion->fecha_salida }}</p>
        <p><strong>Noches:</strong> {{ $reservacion->noches }}</p>
        <p><strong>Código Promocional:</strong> {{ $reservacion->codigo_promocional ?? 'Ninguno' }}</p>
        <p><strong>Monto Total:</strong> ${{ $reservacion->monto_total }}</p>
        <p><strong>Descuento aplicado:</strong> ${{ $reservacion->descuento_aplicado ?? 'Sin '}}</p>
        <p><strong>Notas:</strong> {{ $reservacion->notas ?? 'Sin notas adicionales' }}</p>
        <p><strong>Método de Pago:</strong> {{ $reservacion->metodo_pago}}</p>
    </div>

    <div class="section-container">
        <h3 class="section-title">Habitaciones Reservadas</h3>
        <ul class="inventory-container">
            @forelse ($reservacion->habitaciones as $habitacion)
                <li class="inventory-item">
                    <label>
                        <strong>Habitación:</strong> {{ $habitacion->numero_habitacion }} 
                        ({{ $habitacion->tipo_habitacion_id == 1 ? 'Individual' : ($habitacion->tipo_habitacion_id == 2 ? 'Doble' : ($habitacion->tipo_habitacion_id == 3 ? 'Suite' : ($habitacion->tipo_habitacion_id == 4 ? 'Suite Presidencial' : 'Familiar'))) }}) 
                        - Tarifa: ${{ $habitacion->pivot->tarifa }}
                    </label>
                </li>
            @empty
                <li class="inventory-item">No hay habitaciones reservadas para esta reservación.</li>
            @endforelse
        </ul>
    </div>
</div>

@endsection

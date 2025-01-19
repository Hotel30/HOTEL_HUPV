@extends('layouts.app')

@section('main.content')
<div class="main-content">
    <h1>Detalles de Reservación</h1>

    <h4>Información General</h4>
    <ul>
        <li><strong>Cliente:</strong> {{ $reservacion->cliente->nombre }} {{ $reservacion->cliente->apellidos }}</li>
        <li><strong>Hotel:</strong> {{ $reservacion->hotel->nombre }}</li>
        <li><strong>Tipo de Reservación:</strong> {{ ucfirst($reservacion->tipo_reservacion) }}</li>
        <li><strong>Fecha de Entrada:</strong> {{ $reservacion->fecha_entrada }}</li>
        <li><strong>Fecha de Salida:</strong> {{ $reservacion->fecha_salida }}</li>
        <li><strong>Noches:</strong> {{ $reservacion->noches }}</li>
        <li><strong>Método de Pago:</strong> {{ ucfirst($reservacion->metodo_pago) }}</li>
    </ul>

    <h4>Habitaciones</h4>
    <ul>
        @foreach ($reservacion->habitaciones as $habitacion)
            <li>Habitación {{ $habitacion->numero_habitacion }} - ${{ number_format($habitacion->tarifa, 2) }}</li>
        @endforeach
    </ul>

    <h4>Artículos Adicionales</h4>
    <ul>
        @foreach ($reservacion->inventarios as $articulo)
            <li>{{ $articulo->nombre_producto }} (x{{ $articulo->pivot->cantidad }}) - ${{ number_format($articulo->pivot->subtotal, 2) }}</li>
        @endforeach
    </ul>

    <h4>Promoción</h4>
    <p>
        <strong>Código:</strong> {{ $reservacion->codigo_promocional ?? 'N/A' }} <br>
        <strong>Descuento:</strong> {{ $reservacion->descuento_aplicado }}%
    </p>

    <h4>Notas</h4>
    <p>{{ $reservacion->notas }}</p>

    <h4>Monto Total</h4>
    <p><strong>${{ number_format($reservacion->monto_total, 2) }}</strong></p>

    <a href="{{ route('reservaciones.create') }}" class="btn btn-secondary">Crear otra Reservación</a>
</div>
@endsection

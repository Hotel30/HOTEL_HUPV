@extends('layouts.app')

@section('head.content')
<link rel="stylesheet" href="{{ asset('css/edit_form.css') }}">
@endsection

@section('main.content')
<div class="main-content">
    <h1>Editar Reservación</h1>
    <form action="{{ route('reservaciones.update', $reservacion->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre del Cliente</label>
            <input type="text" name="nombre" id="nombre" value="{{ $reservacion->nombre }}" required>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" id="telefono" value="{{ $reservacion->telefono }}" required>
        </div>

        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" name="email" id="email" value="{{ $reservacion->email }}" required>
        </div>

        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" id="direccion" value="{{ $reservacion->direccion }}" required>
        </div>

        <div class="form-group">
            <label for="hotel_id">Hotel</label>
            <select name="hotel_id" id="hotel_id" required>
                @foreach ($hoteles as $hotel)
                    <option value="{{ $hotel->id }}" {{ $reservacion->hotel_id == $hotel->id ? 'selected' : '' }}>
                        {{ $hotel->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="fecha_entrada">Fecha Entrada</label>
            <input type="date" name="fecha_entrada" id="fecha_entrada" value="{{ $reservacion->fecha_entrada }}" required>
        </div>

        <div class="form-group">
            <label for="fecha_salida">Fecha Salida</label>
            <input type="date" name="fecha_salida" id="fecha_salida" value="{{ $reservacion->fecha_salida }}" required>
        </div>

        <div class="form-group">
    <label for="habitaciones">Habitaciones Seleccionadas</label>
    <select name="habitaciones[]" id="habitaciones" multiple>
        @foreach ($habitaciones as $habitacion)
            <option value="{{ $habitacion->id }}" selected>
                Habitación {{ $habitacion->numero_habitacion }} - ${{ $habitacion->tarifa }}
            </option>
        @endforeach
    </select>
</div>

        <div class="form-group">
            <label for="codigo_promocional">Código Promocional</label>
            <input type="text" name="codigo_promocional" id="codigo_promocional" value="{{ $reservacion->codigo_promocional }}">
        </div>

        <div class="form-group">
            <label for="notas">Notas</label>
            <textarea name="notas" id="notas">{{ $reservacion->notas }}</textarea>
        </div>

        <div class="form-group">
            <label for="monto_total">Monto Total</label>
            <input type="number" name="monto_total" id="monto_total" value="{{ $reservacion->monto_total }}" disabled>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@endsection

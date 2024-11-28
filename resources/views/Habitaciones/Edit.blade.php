@extends('layouts.app')
@section('head.content')
    <title>Editar Habitación</title>
    <link rel="stylesheet" href="{{ asset('/css/edit_form.css') }}">
@endsection

@section('main.content')
<div class="main-content">
    <h1>Editar Habitación</h1>
    <form action="{{ route('habitaciones.update', $habitacion->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="hotel_id">Hotel</label>
            <select name="hotel_id" class="form-control" required>
                <option value="1" {{ $habitacion->hotel_id == 1 ? 'selected' : '' }}>Hotel Sol</option>
                <option value="2" {{ $habitacion->hotel_id == 2 ? 'selected' : '' }}>Hotel Mar</option>
                <option value="3" {{ $habitacion->hotel_id == 3 ? 'selected' : '' }}>Hotel Luna</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tipo_habitacion_id">Tipo de Habitación</label>
            <select name="tipo_habitacion_id" class="form-control" required>
                <option value="1" {{ $habitacion->tipo_habitacion_id == 1 ? 'selected' : '' }}>Suite</option>
                <option value="2" {{ $habitacion->tipo_habitacion_id == 2 ? 'selected' : '' }}>Suite de Lujo</option>
                <option value="3" {{ $habitacion->tipo_habitacion_id == 3 ? 'selected' : '' }}>Sencilla</option>
                <option value="4" {{ $habitacion->tipo_habitacion_id == 4 ? 'selected' : '' }}>Habitación con 4 camas</option>
                <option value="5" {{ $habitacion->tipo_habitacion_id == 5 ? 'selected' : '' }}>Habitación con 5 camas</option>
            </select>
        </div>
        <div class="form-group">
            <label for="numero_habitacion">Número de Habitación</label>
            <input type="text" name="numero_habitacion" class="form-control" value="{{ $habitacion->numero_habitacion }}" required>
        </div>
        <div class="form-group">
            <label for="tarifa">Tarifa</label>
            <input type="number" name="tarifa" class="form-control" step="0.01" value="{{ $habitacion->tarifa }}" required>
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <select name="estado" class="form-control" required>
                <option value="disponible" {{ $habitacion->estado == 'disponible' ? 'selected' : '' }}>Disponible</option>
                <option value="ocupada" {{ $habitacion->estado == 'ocupada' ? 'selected' : '' }}>Ocupada</option>
                <option value="mantenimiento" {{ $habitacion->estado == 'mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
            </select>
        </div>
        <div class="form-group">
            <label for="piso">Piso</label>
            <select name="piso" class="form-control" required>
                <option value="1" {{ $habitacion->piso == 1 ? 'selected' : '' }}>1</option>
                <option value="2" {{ $habitacion->piso == 2 ? 'selected' : '' }}>2</option>
                <option value="3" {{ $habitacion->piso == 3 ? 'selected' : '' }}>3</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection

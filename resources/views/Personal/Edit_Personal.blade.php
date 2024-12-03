@extends('layouts.app')

@section('head.content')
    <title>Editar Personal</title>
    <link rel="stylesheet" href="{{ asset('/css/edit_form.css') }}">
@endsection

@section('main.content')
    <div class="main-content">
        <h2>Editar Personal</h2>
        <form action="{{ route('personal.update', $trabajador->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="input-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $trabajador->nombre) }}" required>
            </div>

            <div class="input-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" value="{{ old('apellidos', $trabajador->apellidos) }}" required>
            </div>

            <div class="input-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" value="{{ old('email', $trabajador->email) }}" required>
            </div>

            <div class="input-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" value="{{ old('telefono', $trabajador->telefono) }}">
            </div>

            <div class="input-group">
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" value="{{ old('direccion', $trabajador->direccion) }}">
            </div>

            <div class="input-group">
                <label for="rol">Rol:</label>
                <select id="rol" name="rol" required>
                    <option value="2" {{ $trabajador->rol == 2 ? 'selected' : '' }}>Empleado</option>
                    <option value="3" {{ $trabajador->rol == 3 ? 'selected' : '' }}>Administrador</option>
                </select>
            </div>

            <div class="input-group">
                <label for="puesto">Puesto:</label>
                <input type="text" id="puesto" name="puesto" value="{{ old('puesto', $trabajador->puesto) }}">
            </div>

            <div class="input-group">
                <label for="turno">Turno:</label>
                <input type="text" id="turno" name="turno" value="{{ old('turno', $trabajador->turno) }}">
            </div>

            <div class="input-group">
                <label for="hora_entrada">Hora de Entrada:</label>
                <input type="time" id="hora_entrada" name="hora_entrada" value="{{ old('hora_entrada', $trabajador->hora_entrada) }}">
            </div>

            <div class="input-group">
                <label for="hora_salida">Hora de Salida:</label>
                <input type="time" id="hora_salida" name="hora_salida" value="{{ old('hora_salida', $trabajador->hora_salida) }}">
            </div>

            <div class="input-group">
                <label for="fecha_ingreso">Fecha de Ingreso:</label>
                <input type="date" id="fecha_ingreso" name="fecha_ingreso" value="{{ old('fecha_ingreso', $trabajador->fecha_ingreso ? \Carbon\Carbon::parse($trabajador->fecha_ingreso)->format('Y-m-d') : '') }}">

            </div>

            <div class="input-group">
                <label for="area_asignada">Área Asignada:</label>
                <input type="text" id="area_asignada" name="area_asignada" value="{{ old('area_asignada', $trabajador->area_asignada) }}">
            </div>

            <div class="input-group">
                <label for="tarea_asignada">Tarea Asignada:</label>
                <input type="text" id="tarea_asignada" name="tarea_asignada" value="{{ old('tarea_asignada', $trabajador->tarea_asignada) }}">
            </div>

            <div class="input-group">
                <label for="estado">Estado:</label>
                <select id="estado" name="estado" required>
                    <option value="1" {{ $trabajador->estado == 1 ? 'selected' : '' }}>Activo</option>
                    <option value="0" {{ $trabajador->estado == 0 ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>

            <div class="input-group">
                <label for="id_hotel">Hotel:</label>
                <select id="id_hotel" name="id_hotel">
                    <option value="1" {{ $trabajador->id_hotel == 1 ? 'selected' : '' }}>Hotel Sol</option>
                    <option value="2" {{ $trabajador->id_hotel == 2 ? 'selected' : '' }}>Hotel Luna</option>
                    <option value="3" {{ $trabajador->id_hotel == 3 ? 'selected' : '' }}>Hotel Estrella</option>
                </select>
            </div>

            <div class="button-group">
                <a href="{{ route('personal.index') }}" class="cancel-button">Cancelar</a>
                <button type="submit" class="cancel-button">Registrar</button>
            </div>

        </form>
    </div>
@endsection
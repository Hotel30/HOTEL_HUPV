@extends('layouts.app')

@section('head.content')
<link rel="stylesheet" href="{{ asset('/css/listado.css') }}">
@endsection

@section('main.content')
    <div class="main-content">
        <h2>Usuarios</h2>
        <div class="top-bar">
                <a href="{{ route('personal.create') }}" class="edit-button">Añadir Cliente</a>
            </div>
        <table class="user-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Puesto</th>
                    <th>Turno</th>
                    <th>Fecha Ingreso</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Hora Entrada</th>
                    <th>Hora Salida</th>
                    <th>Área Asignada</th>
                    <th>Tarea Asignada</th>
                    <th>Hotel</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trabajadores as $trabajador)
                    <tr>
                        <td>{{ $trabajador->nombre }}</td>
                        <td>{{ $trabajador->apellidos }}</td>
                        <td>{{ $trabajador->email }}</td>
                        <td>{{ $trabajador->puesto }}</td>
                        <td>{{ $trabajador->turno }}</td>
                        <td>{{ $trabajador->fecha_ingreso }}</td>
                        <td>{{ $trabajador->telefono }}</td>
                        <td>{{ $trabajador->direccion }}</td>
                        <td>{{ $trabajador->hora_entrada->format('H:i') }}</td>  
                        <td>{{ $trabajador->hora_salida->format('H:i') }}</td>   
                        <td>{{ $trabajador->area_asignada }}</td>
                        <td>{{ $trabajador->tarea_asignada }}</td>
                        <td>{{ $trabajador->hotel->nombre ?? 'No asignado' }}</td> 
                        <td>
                            <a href="{{ route('personal.edit', $trabajador->id) }}" class="btn-edit">Editar</a>
                            <form action="{{ route('personal.destroy', $trabajador->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
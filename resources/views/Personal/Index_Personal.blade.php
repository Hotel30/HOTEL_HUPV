@extends('layouts.app')

@section('head.content')
<link rel="stylesheet" href="{{ asset('css/listado.css') }}">
@endsection

@section('main.content')
<div class="main-content">
    <main class="table" id="personal_table">
        <section class="table__header">
            <h1>Lista de Personal</h1>
            <div class="input-group">
                <input type="search" placeholder="Buscar...">
            </div>
            <div class="top-bar">
                <a href="{{ route('personal.create') }}" class="edit-button">Añadir Personal</a>
            </div>

            <div class="top-bar">
                <a href="{{ route('pedro') }}" class="delete-button">Generar Reporte</a>
            </div>
        </section>
        <section class="table__body">
            <table>
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
                        <th></th>
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
                                <a href="{{ route('personal.edit', $trabajador->id) }}" class="edit-button">Editar</a>
                                <form action="{{ route('personal.destroy', $trabajador->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
</div>
@endsection

@section('sidebar.content')
<ul>
    <li class="sidebar-content"><a href="#">Estadísticas</a></li>
    <li class="sidebar-content"><a href="#">Mapeo</a></li>
    <li class="sidebar-content"><a href="#">Clientes</a></li>
    <li class="sidebar-content"><a href="#">Ocupación</a></li>
    <li class="sidebar-content"><a href="#">Reportes</a></li>
</ul>
@endsection
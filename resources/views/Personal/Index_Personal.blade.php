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
                        <th>Nombre <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Apellidos <span class="icon-arrow">&UpArrow;</span></th>
                        <!--<th>Correo <span class="icon-arrow">&UpArrow;</span></th>-->
                        <th>Puesto <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Turno <span class="icon-arrow">&UpArrow;</span></th>
                        <!--<th>Fecha Ingreso</th>-->
                        <th>Teléfono <span class="icon-arrow">&UpArrow;</span></th>
                        <!--<th>Dirección</th>-->
                        <th>Hora Entrada <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Hora Salida <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Área Asignada <span class="icon-arrow">&UpArrow;</span></th>
                        <!--<th>Tarea Asignada</th>-->
                        <th>Hotel <span class="icon-arrow">&UpArrow;</span></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trabajadores as $trabajador)
                        <tr>
                            <td>{{ $trabajador->nombre }}</td>
                            <td>{{ $trabajador->apellidos }}</td>
                            <!--<td>{{ $trabajador->email }}</td>-->
                            <td>{{ $trabajador->puesto }}</td>
                            <td>{{ $trabajador->turno }}</td>
                            <!--<<td>{{ $trabajador->fecha_ingreso }}</td>-->
                            <td>{{ $trabajador->telefono }}</td>
                            <!--<td>{{ $trabajador->direccion }}</td>-->
                            <td>{{ $trabajador->hora_entrada ? $trabajador->hora_entrada->format('H:i') : 'No disponible' }}</td>
<td>{{ $trabajador->hora_salida ? $trabajador->hora_salida->format('H:i') : 'No disponible' }}</td>

                            <td>{{ $trabajador->area_asignada }}</td>
                            <!--<td>{{ $trabajador->tarea_asignada }}</td>-->
                            <td>{{ $trabajador->hotel->nombre ?? 'No asignado' }}</td> 
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('personal.edit', $trabajador->id) }}" class="edit-button">Editar</a>
                                    <form action="{{ route('personal.destroy', $trabajador->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-button">Borrar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
</div>
@endsection
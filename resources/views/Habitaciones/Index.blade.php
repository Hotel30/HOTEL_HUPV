@extends('layouts.app')

@section('head.content')
<link rel="stylesheet" href="{{ asset('css/listado.css') }}">
@endsection

@section('main.content')
<div class="main-content">
    <h1>Lista de Habitaciones</h1>
    <a href="{{ route('habitaciones.create') }}" class="btn btn-primary">Nueva Habitación</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hotel</th>
                <th>Tipo</th>
                <th>Número</th>
                <th>Tarifa</th>
                <th>Estado</th>
                <th>Piso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($habitaciones as $habitacion)
                <tr>
                    <td>{{ $habitacion->id }}</td>
                    <td>
                        @switch($habitacion->hotel_id)
                            @case(1)
                                Hotel Sol
                                @break
                            @case(2)
                                Hotel Mar
                                @break
                            @case(3)
                                Hotel Luna
                                @break
                            @default
                                Hotel desconocido
                        @endswitch
                    </td>
                    <td>
                        @switch($habitacion->tipo_habitacion_id)
                            @case(1)
                                Suite
                                @break
                            @case(2)
                                Suite de Lujo
                                @break
                            @case(3)
                                Sencilla
                                @break
                            @case(4)
                                Habitación con 4 camas
                                @break
                            @case(5)
                                Habitación con 5 camas
                                @break
                            @default
                                Tipo desconocido
                        @endswitch
                    </td>

                    <td>{{ $habitacion->numero_habitacion }}</td>
                    <td>${{ number_format($habitacion->tarifa, 2) }}</td>
                    <td>{{ ucfirst($habitacion->estado) }}</td>
                    <td>{{ $habitacion->piso }}</td>
                    <td>
                        <a href="{{ route('habitaciones.edit', $habitacion->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('habitaciones.destroy', $habitacion->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

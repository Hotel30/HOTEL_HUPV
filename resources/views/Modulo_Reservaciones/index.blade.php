@extends('layouts.app')

@section('head.content')
<link rel="stylesheet" href="{{ asset('css/listado.css') }}">
@endsection

@section('main.content')
<div class="main-content">
    <main class="table" id="reservaciones_table">
        <section class="table__header">
            <h1>Lista de Reservaciones</h1>
            <div class="input-group">
                <input type="search" placeholder="Buscar...">
            </div>
            <div class="top-bar">
                <a href="{{ route('reservaciones.create') }}" class="edit-button">Añadir Reservación</a>
            </div>
        </section>

        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Cliente</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Fecha Entrada</th>
                        <th>Fecha Salida</th>
                        <th>Monto Total</th>
                        <th>Método Pago</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservaciones as $reservacion)
                        <tr>
                            <td>{{ $reservacion->id }}</td>
                            <td>{{ $reservacion->nombre }}</td>
                            <td>{{ $reservacion->email }}</td>
                            <td>{{ $reservacion->telefono }}</td>
                            <td>{{ \Carbon\Carbon::parse($reservacion->fecha_entrada)->format('d-m-Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($reservacion->fecha_salida)->format('d-m-Y') }}</td>
                            <td>${{ number_format($reservacion->monto_total, 2) }}</td>
                            <td>{{ ucfirst($reservacion->metodo_pago) }}</td>
                            <td>
                                <div class="action-buttons">
                                <a href="{{ route('reservaciones.show', $reservacion->id) }}" class="edit-button">Ver detalles</a>
                                    <a href="{{ route('reservaciones.edit', $reservacion->id) }}" class="edit-button">Editar</a>
                                    <form action="{{ route('reservaciones.destroy', $reservacion->id) }}" method="POST" style="display:inline;">
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

@extends('layouts.app')

@section('head.content')
<link rel="stylesheet" href="{{ asset('css/listado.css') }}">
@endsection


@section('main.content')
<div class="main-content">
    <main class="table" id="ordenes_table">
        <section class="table__header">
            <h1>Ordenes de Compra</h1>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>ID <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Hotel <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Proveedor <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Producto <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Cantidad <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Precio Unitario <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Subtotal <span class="icon-arrow">&UpArrow;</span></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ordenesCompra as $orden)
                        <tr>
                            <td>{{ $orden->id }}</td>
                            <td>{{ $orden->hotel->nombre }}</td>
                            <td>{{ $orden->proveedor->nombre }}</td>
                            <td>{{ $orden->producto->nombre_producto }}</td>
                            <td>{{ $orden->cantidad }}</td>
                            <td>${{ $orden->precio_unitario }}</td>
                            <td>${{ $orden->subtotal }}</td>
                            <td>
                                <form action="{{ route('ordenes-compra.print', $orden->id) }}" method="GET" target="_blank">
                                    <button type="submit" class="restock-button">Imprimir</button>
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
    <div class="sidebar-content">
        <a href="{{ route('inventario.index') }}">
                Stock
        </a>
    </div>

    <div class="sidebar-content" class="active">
    <a href="{{ route('ordenes-compra.index') }}">
        Ordenes
        </a>
    </div>    
@endsection

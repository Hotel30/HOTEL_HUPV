@extends('layouts.app')

@section('head.content')
    <title>Editar Item</title>
    <link rel="stylesheet" href="{{ asset('/css/edit_form.css') }}">
@endsection

@section('main.content')
<main class="main-content">
    <h2>Editar Producto</h2>

    <form action="{{ route('inventario.update', $inventario->id_producto) }}" method="POST" class="edit-form">
        @csrf
        @method('PUT')
        <div class="input-group">
            <label for="nombre_producto">Producto</label>
            <input type="text" id="nombre_producto" name="nombre_producto" value="{{ $inventario->nombre_producto }}" required>
        </div>

        <div class="input-group">
            <label for="hotel_id">Hotel</label>
            <select id="hotel_id" name="hotel_id" required>
                @foreach($hoteles as $hotel)
                    <option value="{{ $hotel->id }}" {{ $hotel->id == $inventario->hotel_id ? 'selected' : '' }}>
                        {{ $hotel->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="input-group">
            <label for="proveedor_id">Proveedor</label>
            <select id="proveedor_id" name="proveedor_id" required>
                @foreach($proveedores as $proveedor)
                    <option value="{{ $proveedor->id }}" {{ $proveedor->id == $inventario->proveedor_id ? 'selected' : '' }}>
                        {{ $proveedor->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="input-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" id="cantidad" name="cantidad" value="{{ $inventario->cantidad }}" required>
        </div>

        <div class="input-group">
            <label for="precio">Precio</label>
            <input type="number" step="0.01" min="0" id="precio" name="precio" value="{{ $inventario->precio }}" required>
        </div>

        <div class="input-group">
            <label for="descripcion">Descripción</label>
            <input type="text" id="descripcion" name="descripcion" value="{{ $inventario->descripcion }}" required>
        </div>

        <div class="button-group">
            <a href="{{ route('inventario.index') }}" class="cancel-button">Cancelar</a>
            <button type="submit" class="cancel-button">Guardar Cambios</button>
        </div>
    </form>
</main>

@if ($errors->any())
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    window.onload = function () {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: `{!! implode('<br>', $errors->all()) !!}`,
            confirmButtonText: 'Entendido'
        });
    };
</script>
@endif

@endsection

@section('sidebar.content')
    <div class="sidebar-content" class="active">
        <a href="{{ route('inventario.index') }}">
                Stock
        </a>
    </div>

    <div class="sidebar-content">
    <a href="{{ route('ordenes-compra.index') }}">
        Ordenes
        </a>
    </div>    
@endsection


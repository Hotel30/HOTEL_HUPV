@extends('layouts.app')

@section('head.content')
<link rel="stylesheet" href="{{ asset('css/listado.css') }}">
@endsection

@section('main.content')
<div class="main-content">
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Inventario</h1>
            <div class="input-group">
                <input type="search" placeholder="Buscar...">
            </div>

            <div class="top-bar">
                <a href="{{ route('inventario.create') }}" class="edit-button">Añadir Item</a>
            </div>

            <div class="top-bar">
                <a href="{{ route('pdf') }}" class="delete-button">Generar Reporte</a>
            </div>
            
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Nombre Producto <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Hotel <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Proveedor <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Cantidad <span class="icon-arrow">&UpArrow;</span></th>
                        <th></th>
                        <th> Descripción <span class="icon-arrow">&UpArrow;</span></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inventarios as $inventario)
                    <tr id="inventario-{{ $inventario->id_producto }}">
                        <td>{{ $inventario->nombre_producto }}</td>
                        <td>{{ $inventario->hotel->nombre }}</td>
                        <td>{{ $inventario->proveedor->nombre }}</td>
                        <td class="cantidad">{{ $inventario->cantidad }}</td>
                        <td> 
                            <button class="decrement-button" data-id="{{ $inventario->id_producto }}">➖</button>
                        </td>
                        <td>{{ $inventario->descripcion }}</td>
                        <td>
                            <div class="action-buttons">
                                <button class="restock-button" data-id="{{ $inventario->id_producto }}" data-price="{{ $inventario->precio }}">Restock</button>
                                <a href="{{ route('inventario.edit', ['inventario' => $inventario->id_producto]) }}" class="edit-button">Editar</a>
                                <form action="{{ route('inventario.destroy', $inventario->id_producto) }}" method="POST" class="delete-form">
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

<script>
    document.querySelectorAll('.decrement-button').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            fetch(`/inventario/decrement/${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                document.querySelector(`#inventario-${id} .cantidad`).textContent = data.cantidad;
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
        });
    });

    document.querySelectorAll('.restock-button').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const price = this.getAttribute('data-price');
            const quantity = prompt('Enter the quantity to restock:');
            if (quantity && !isNaN(quantity) && quantity > 0) {
                window.location.href = `/inventario/restock/${id}?quantity=${quantity}&price=${price}`;
            } else {
                alert('Please enter a valid quantity.');
            }
        });
    });
</script>

@endsection

@section('sidebar.content')
    <div class="sidebar-content">Stock</div>
    <div class="sidebar-content">Ordenes</div>
@endsection

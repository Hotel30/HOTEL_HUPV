@extends('layouts.app')

@section('main.content')
<div class="main-content">
    <h1>Crear Reservación</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reservaciones.store') }}" method="POST">
        @csrf

        <h4>Información General</h4>
        <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente (ID)</label>
            <input type="number" name="cliente_id" id="cliente_id" class="form-control" value="{{ auth()->user()->id }}" readonly>
        </div>

        <div class="mb-3">
            <label for="hotel_id" class="form-label">Hotel</label>
            <select name="hotel_id" id="hotel_id" class="form-select" required>
                <option value="" selected disabled>Seleccione un hotel</option>
                @foreach ($hoteles as $hotel)
                    <option value="{{ $hotel->id }}">{{ $hotel->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tipo_reservacion" class="form-label">Tipo de Reservación</label>
            <select name="tipo_reservacion" id="tipo_reservacion" class="form-select" required>
                <option value="" selected disabled>Seleccione el tipo</option>
                <option value="individual">Individual</option>
                <option value="grupal">Grupal</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_entrada" class="form-label">Fecha de Entrada</label>
            <input type="date" name="fecha_entrada" id="fecha_entrada" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="fecha_salida" class="form-label">Fecha de Salida</label>
            <input type="date" name="fecha_salida" id="fecha_salida" class="form-control" required>
        </div>

        <h4>Habitaciones</h4>
        <div class="mb-3">
            <label for="habitaciones" class="form-label">Seleccione Habitaciones</label>
            <select name="habitaciones[]" id="habitaciones" class="form-select" multiple required>
                {{-- Las opciones se llenarán dinámicamente con JavaScript --}}
            </select>
        </div>

        <h4>Promoción</h4>
        <div class="mb-3">
            <label for="codigo_promocional" class="form-label">Código Promocional</label>
            <input type="text" name="codigo_promocional" id="codigo_promocional" class="form-control">
        </div>

        <h4>Artículos Adicionales</h4>
        <div id="articulos-container">
            @foreach ($inventarios as $item)
                <div class="form-check">
                    <input type="checkbox" name="articulos[{{ $item->id_producto }}][id]" value="{{ $item->id_producto }}" class="form-check-input">
                    <label class="form-check-label">
                        {{ $item->nombre_producto }} - ${{ number_format($item->precio, 2) }}
                        <input type="number" name="articulos[{{ $item->id_producto }}][cantidad]" class="form-control mt-2" placeholder="Cantidad" min="1">
                    </label>
                </div>
            @endforeach
        </div>

        <h4>Notas</h4>
        <div class="mb-3">
            <textarea name="notas" id="notas" class="form-control" rows="4"></textarea>
        </div>

        <h4>Método de Pago</h4>
        <div class="mb-3">
            <label for="metodo_pago" class="form-label">Método de Pago</label>
            <input type="text" name="metodo_pago" id="metodo_pago" class="form-control" value="PayPal" readonly>
        </div>

        <button type="submit" class="btn btn-primary">Crear Reservación</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        // Variables de los elementos
        const $hotelSelect = $('#hotel_id');
        const $tipoReservacionSelect = $('#tipo_reservacion');
        const $habitacionesSelect = $('#habitaciones');

        // Evento para cargar habitaciones al cambiar el hotel o tipo de reservación
        $hotelSelect.add($tipoReservacionSelect).on('change', function () {
            const hotelId = $hotelSelect.val();
            const tipoReservacion = $tipoReservacionSelect.val();

            // Limpiar opciones anteriores
            $habitacionesSelect.empty();

            if (hotelId && tipoReservacion) {
                // Llamada AJAX para obtener las habitaciones filtradas
                $.ajax({
                    url: "{{ route('api.habitaciones.disponibles') }}", // Ruta que devolverá habitaciones
                    method: "GET",
                    data: { hotel_id: hotelId, tipo_reservacion: tipoReservacion },
                    success: function (data) {
                        // Rellenar select con las habitaciones recibidas
                        if (data.length > 0) {
                            data.forEach(function (habitacion) {
                                $habitacionesSelect.append(
                                    `<option value="${habitacion.id}">Habitación ${habitacion.numero_habitacion} - ${habitacion.estado} - $${parseFloat(habitacion.tarifa).toFixed(2)}</option>`
                                );
                            });
                        } else {
                            $habitacionesSelect.append('<option value="">No hay habitaciones disponibles</option>');
                        }
                    },
                    error: function () {
                        alert('Error al cargar las habitaciones. Intente nuevamente.');
                    }
                });
            } else {
                $habitacionesSelect.append('<option value="">Seleccione un hotel y tipo de reservación</option>');
            }
        });
    });
</script>
@endsection

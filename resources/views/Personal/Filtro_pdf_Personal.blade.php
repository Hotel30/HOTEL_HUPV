@extends('layouts.app')

@section('head.content')
    <title>Realizar reporte del inventario</title>
    <link rel="stylesheet" href="{{ asset('/css/reporte.css') }}">
@endsection


@section('main.content') 
<main class="main-content">
    <h2>Filtrar reporte</h2>

    <form  action="{{route('jesus')}}"method="GET" class="edit-form">
        @csrf
        <div class="input-group">
            <label for="hotel_id">Filtrar por Hotel</label>
            <select id="hotel_id" name="hotel_id" disabled>
                <option value="">Todos</option>
                @foreach ($hoteles as $hotel)
                    <option value="{{ $hotel->id }}">
                        {{ $hotel->nombre }}
                    </option>
                @endforeach
            </select>
            <input type="checkbox" id="filter_hotel" name="filter_hotel">
        </div>
    
        <div class="input-group">
            <label for="turno_id">Filtrar por Turno</label>
            <select id="turno_id" name="turno_id" disabled>
                <option value="">Todos</option>
                <option value="Vespertino">Vespertino</option>
                <option value="Matutino">Matutino</option>
            </select>
            <input type="checkbox" id="filter_turno" name="filter_turno">
        </div>
    
        <div class="button-group">
            <a href="{{ route('inventario.index') }}" class="cancel-button">Cancelar</a>
            <button id="button" type="submit" class="cancel-button">Generar PDF</button>
        </div>    </form>
    
    <script>
        const button = document.getElementById('button');

        button.style.display = 'none';

        function verificarCheckboxes() {
            const filterHotel = document.getElementById('filter_hotel').checked;
            const filterTurno = document.getElementById('filter_turno').checked;

            button.style.display = (filterHotel || filterTurno) ? 'block' : 'none';
        }

        document.getElementById('filter_hotel').addEventListener('change', function () {
            document.getElementById('hotel_id').disabled = !this.checked;
            verificarCheckboxes(); 
        });

        document.getElementById('filter_turno').addEventListener('change', function () {
            document.getElementById('turno_id').disabled = !this.checked;
            verificarCheckboxes(); 
        });
    </script>
</main>
@endsection
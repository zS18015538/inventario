<!-- resources/views/movimientos/historial.blade.php -->

@extends('layouts.app')

@section('title', 'Historial de Movimientos')

@section('content')
    <div class="dashboard-container">
        <h2>Historial de Movimientos</h2>

        <!-- Formulario de Filtro -->
        <form method="GET" action="{{ route('movimientos.historial') }}" class="filter-form">
            <div class="form-group">
                <label for="tipo">Filtrar por tipo:</label>
                <select name="tipo" id="tipo" class="form-control">
                    <option value="">Todos</option>
                    <option value="entrada" {{ request('tipo') == 'entrada' ? 'selected' : '' }}>Entrada</option>
                    <option value="salida" {{ request('tipo') == 'salida' ? 'selected' : '' }}>Salida</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="filter-button">Filtrar</button>
            </div>
        </form>

        <!-- Tabla de Movimientos -->
        <table class="product-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Tipo</th>
                    <th>Cantidad</th>
                    <th>Usuario</th>
                    <th>Fecha y Hora</th>
                </tr>
            </thead>
            <tbody>
                @foreach($movimientos as $movimiento)
                    <tr>
                        <td>{{ $movimiento->idMovimiento }}</td>
                        <td>{{ $movimiento->producto->nombre }}</td>
                        <td>{{ ucfirst($movimiento->tipo) }}</td>
                        <td>{{ $movimiento->cantidad }}</td>
                        <td>{{ $movimiento->usuario->nombre }}</td>
                        <td>{{ $movimiento->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
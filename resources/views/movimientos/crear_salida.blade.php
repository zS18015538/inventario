<!-- resources/views/movimientos/crear_salida.blade.php -->

@extends('layouts.app')

@section('title', 'Registrar Salida de Producto')

@section('content')
    <div class="form-container">
        <h2>Registrar Salida de Producto</h2>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('movimientos.guardarSalida') }}" method="POST" class="product-form">
            @csrf
            <div class="form-group">
                <label for="idProducto">Producto:</label>
                <select name="idProducto" id="idProducto" class="form-control" required>
                    <option value="">Seleccionar Producto</option>
                    @foreach($productos as $producto)
                        <option value="{{ $producto->idProducto }}">{{ $producto->nombre }} (Cantidad: {{ $producto->cantidad }})</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad a Sacar:</label>
                <input type="number" id="cantidad" name="cantidad" class="form-control" min="1" required>
            </div>
            <div class="form-group">
                <button type="submit" class="submit-button">Registrar Salida</button>
            </div>
        </form>
    </div>
@endsection
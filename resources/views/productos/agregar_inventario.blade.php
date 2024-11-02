<!-- resources/views/productos/agregar_inventario.blade.php -->

@extends('layouts.app')

@section('title', 'Agregar Inventario')

@section('content')
    <div class="form-container">
        <h2>Agregar Inventario para: {{ $producto->nombre }}</h2>

        <!-- Mensajes de Error y Éxito -->
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario de Agregar Inventario -->
        <form action="{{ route('productos.guardarInventario', $producto->idProducto) }}" method="POST" class="product-form">
            @csrf

            <div class="form-group">
                <label for="cantidad">Cantidad a Agregar:</label>
                <input type="number" id="cantidad" name="cantidad" class="form-control" min="1" required value="{{ old('cantidad') }}">
                @error('cantidad')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group button-group">
                <button type="submit" class="submit-button">Agregar Inventario</button>
                <a href="{{ route('productos.index') }}" class="cancel-button">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
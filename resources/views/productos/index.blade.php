<!-- resources/views/productos/inventario.blade.php -->

@extends('layouts.app')

@section('title', 'Inventario de Productos')

@section('content')
    <div class="dashboard-container">
        <h2>Inventario de Productos</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(Auth::user()->idRol == 1)
            <a href="{{ route('productos.create') }}" class="add-button">Agregar Nuevo Producto</a>
        @endif

        <table class="product-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Estatus</th>
                    @if(Auth::user()->idRol == 1)
                        <th>Acciones</th>
                        <th>Inventario</th> <!-- Nueva columna para acciones de inventario -->
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->idProducto }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>{{ $producto->cantidad }}</td>
                        <td>{{ $producto->estatus ? 'Activo' : 'Inactivo' }}</td>
                        @if(Auth::user()->idRol == 1)
                            <td>
                                <a href="{{ route('productos.edit', $producto->idProducto) }}" class="edit-button">Editar</a>
                                <form action="{{ route('productos.destroy', $producto->idProducto) }}" method="POST" class="inline-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-button" onclick="return confirm('¿Estás seguro de cambiar el estatus de este producto?')">
                                        {{ $producto->estatus ? 'Dar de Baja' : 'Reactivar' }}
                                    </button>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('productos.agregarInventario', $producto->idProducto) }}" class="add-inventory-button">Agregar Inventario</a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
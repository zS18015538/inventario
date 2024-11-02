<!-- resources/views/dashboard.blade.php -->

@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="dashboard-container">
        <h1>Bienvenido, {{ Auth::user()->nombre }}</h1>
        <!-- Puedes agregar más contenido aquí -->
    </div>
@endsection
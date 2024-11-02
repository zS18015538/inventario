@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="dashboard-container">
        <h1>Bienvenido, {{ Auth::user()->nombre }}</h1>
    </div>
@endsection
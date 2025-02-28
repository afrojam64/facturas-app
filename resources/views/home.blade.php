@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div class="container">
    <h1>Bienvenido a la Aplicación de Facturación</h1>
    <p>Seleccione una de las siguientes opciones para comenzar:</p>
    <div class="list-group">
        <a href="{{ route('clientes.index') }}" class="list-group-item list-group-item-action">Clientes</a>
        <a href="{{ route('productos.index') }}" class="list-group-item list-group-item-action">Productos</a>
        <a href="{{ route('ventas.index') }}" class="list-group-item list-group-item-action">Ventas</a>
        <a href="{{ route('facturas.index') }}" class="list-group-item list-group-item-action">Facturas</a>
    </div>
</div>
@endsection
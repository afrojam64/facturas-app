@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Cliente</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $cliente->id }}</td>
        </tr>
        <tr>
            <th>Nombre</th>
            <td>{{ $cliente->nombre }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $cliente->email }}</td>
        </tr>
        <tr>
            <th>Teléfono</th>
            <td>{{ $cliente->telefono }}</td>
        </tr>
    </table>
    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
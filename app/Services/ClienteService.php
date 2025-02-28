<?php

namespace App\Services;

use App\Contracts\ClienteServiceInterface;
use App\Models\Cliente;

class ClienteService implements ClienteServiceInterface
{
    public function listarClientes()
    {
        return Cliente::all();
    }

    public function crearCliente(array $data)
    {
        return Cliente::create($data);
    }

    public function obtenerCliente(int $id)
    {
        return Cliente::findOrFail($id);
    }

    public function actualizarCliente(Cliente $cliente, array $data)
    {
        $cliente->update($data);
        return $cliente;
    }

    public function desactivarCliente(Cliente $cliente)
    {
        $cliente->update(['activo' => false]);
        return $cliente;
    }
}
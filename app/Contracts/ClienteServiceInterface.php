<?php

namespace App\Contracts;

use App\Models\Cliente;

interface ClienteServiceInterface
{
    public function listarClientes();
    public function crearCliente(array $data);
    public function obtenerCliente(int $id);
    public function actualizarCliente(Cliente $cliente, array $data);
    public function desactivarCliente(Cliente $cliente);
}
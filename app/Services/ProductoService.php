<?php

namespace App\Services;

use App\Contracts\ProductoServiceInterface;
use App\Models\Producto;

class ProductoService implements ProductoServiceInterface
{
    public function listarProductos()
    {
        return Producto::all();
    }

    public function crearProducto(array $data)
    {
        return Producto::create($data);
    }

    public function obtenerProducto(int $id)
    {
        return Producto::findOrFail($id);
    }

    public function actualizarProducto(Producto $producto, array $data)
    {
        $producto->update($data);
        return $producto;
    }

    public function desactivarProducto(Producto $producto)
    {
        $producto->update(['activo' => false]);
        return $producto;
    }
}
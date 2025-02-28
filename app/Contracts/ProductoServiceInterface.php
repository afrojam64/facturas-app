<?php

namespace App\Contracts;

use App\Models\Producto;

interface ProductoServiceInterface
{
    public function listarProductos();
    public function crearProducto(array $data);
    public function obtenerProducto(int $id);
    public function actualizarProducto(Producto $producto, array $data);
    public function desactivarProducto(Producto $producto);
}
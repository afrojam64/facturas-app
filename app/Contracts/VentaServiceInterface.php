<?php

namespace App\Contracts;

use App\Models\Venta;

interface VentaServiceInterface
{
    public function listarVentas();
    public function crearVenta(array $data);
    public function obtenerVenta(int $id);
    public function actualizarVenta(Venta $venta, array $data);
    public function desactivarVenta(Venta $venta);
}
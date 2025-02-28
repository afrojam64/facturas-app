<?php

namespace App\Services;

use App\Contracts\VentaServiceInterface;
use App\Models\Venta;

class VentaService implements VentaServiceInterface
{
    public function listarVentas()
    {
        return Venta::all();
    }

    public function crearVenta(array $data)
    {
        return Venta::create($data);
    }

    public function obtenerVenta(int $id)
    {
        return Venta::findOrFail($id);
    }

    public function actualizarVenta(Venta $venta, array $data)
    {
        $venta->update($data);
        return $venta;
    }

    public function desactivarVenta(Venta $venta)
    {
        $venta->update(['activo' => false]);
        return $venta;
    }
}
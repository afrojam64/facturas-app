<?php

namespace App\Services;

use App\Contracts\FacturaServiceInterface;
use App\Models\Factura;

class FacturaService implements FacturaServiceInterface
{
    public function listarFacturas()
    {
        return Factura::all();
    }

    public function crearFactura(array $data)
    {
        return Factura::create($data);
    }

    public function obtenerFactura(int $id)
    {
        return Factura::findOrFail($id);
    }

    public function actualizarFactura(Factura $factura, array $data)
    {
        $factura->update($data);
        return $factura;
    }

    public function desactivarFactura(Factura $factura)
    {
        $factura->update(['activo' => false]);
        return $factura;
    }
}
<?php

namespace App\Contracts;

use App\Models\Factura;

interface FacturaServiceInterface
{
    public function listarFacturas();
    public function crearFactura(array $data);
    public function obtenerFactura(int $id);
    public function actualizarFactura(Factura $factura, array $data);
    public function desactivarFactura(Factura $factura);
}
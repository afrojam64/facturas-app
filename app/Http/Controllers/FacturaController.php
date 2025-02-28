<?php

namespace App\Http\Controllers;

use App\Contracts\FacturaServiceInterface;
use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Venta;

class FacturaController extends Controller
{
    protected $facturaService;

    public function __construct(FacturaServiceInterface $facturaService)
    {
        $this->facturaService = $facturaService;
    }

    public function index()
    {
        $facturas = $this->facturaService->listarFacturas();
        return view('facturas.index', compact('facturas'));
    }

    public function create()
    {
        $ventas = Venta::all();
        return view('facturas.create', compact('ventas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'venta_id' => 'required|exists:ventas,id',
            'fecha' => 'required|date',
        ]);

        $this->facturaService->crearFactura($request->all());

        return redirect()->route('facturas.index')
                         ->with('success', 'Factura creada exitosamente.');
    }

    public function show($id)
    {
        $factura = $this->facturaService->obtenerFactura($id);
        return view('facturas.show', compact('factura'));
    }

    public function edit($id)
    {
        $factura = $this->facturaService->obtenerFactura($id);
        $ventas = Venta::all();
        return view('facturas.edit', compact('factura', 'ventas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'venta_id' => 'required|exists:ventas,id',
            'fecha' => 'required|date',
        ]);

        $factura = $this->facturaService->obtenerFactura($id);
        $this->facturaService->actualizarFactura($factura, $request->all());

        return redirect()->route('facturas.index')
                         ->with('success', 'Factura actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $factura = $this->facturaService->obtenerFactura($id);
        $this->facturaService->desactivarFactura($factura);

        return redirect()->route('facturas.index')
                         ->with('success', 'Factura desactivada exitosamente.');
    }
}
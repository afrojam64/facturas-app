<?php

namespace App\Http\Controllers;

use App\Contracts\VentaServiceInterface;
use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Cliente;

class VentaController extends Controller
{
    protected $ventaService;

    public function __construct(VentaServiceInterface $ventaService)
    {
        $this->ventaService = $ventaService;
    }

    public function index()
    {
        $ventas = $this->ventaService->listarVentas();
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('ventas.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fecha' => 'required|date',
            'total' => 'required|numeric',
        ]);

        $this->ventaService->crearVenta($request->all());

        return redirect()->route('ventas.index')
                         ->with('success', 'Venta creada exitosamente.');
    }

    public function show($id)
    {
        $venta = $this->ventaService->obtenerVenta($id);
        return view('ventas.show', compact('venta'));
    }

    public function edit($id)
    {
        $venta = $this->ventaService->obtenerVenta($id);
        $clientes = Cliente::all();
        return view('ventas.edit', compact('venta', 'clientes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fecha' => 'required|date',
            'total' => 'required|numeric',
        ]);

        $venta = $this->ventaService->obtenerVenta($id);
        $this->ventaService->actualizarVenta($venta, $request->all());

        return redirect()->route('ventas.index')
                         ->with('success', 'Venta actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $venta = $this->ventaService->obtenerVenta($id);
        $this->ventaService->desactivarVenta($venta);

        return redirect()->route('ventas.index')
                         ->with('success', 'Venta desactivada exitosamente.');
    }
}
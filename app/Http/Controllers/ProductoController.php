<?php

namespace App\Http\Controllers;

use App\Contracts\ProductoServiceInterface;
use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    protected $productoService;

    public function __construct(ProductoServiceInterface $productoService)
    {
        $this->productoService = $productoService;
    }

    public function index()
    {
        $productos = $this->productoService->listarProductos();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $this->productoService->crearProducto($request->all());

        return redirect()->route('productos.index')
                         ->with('success', 'Producto creado exitosamente.');
    }

    public function show($id)
    {
        $producto = $this->productoService->obtenerProducto($id);
        return view('productos.show', compact('producto'));
    }

    public function edit($id)
    {
        $producto = $this->productoService->obtenerProducto($id);
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $producto = $this->productoService->obtenerProducto($id);
        $this->productoService->actualizarProducto($producto, $request->all());

        return redirect()->route('productos.index')
                         ->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $producto = $this->productoService->obtenerProducto($id);
        $this->productoService->desactivarProducto($producto);

        return redirect()->route('productos.index')
                         ->with('success', 'Producto desactivado exitosamente.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Contracts\ClienteServiceInterface;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    protected $clienteService;

    public function __construct(ClienteServiceInterface $clienteService)
    {
        $this->clienteService = $clienteService;
    }

    public function index()
    {
        $clientes = $this->clienteService->listarClientes();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:clientes',
            'telefono' => 'required',
        ]);

        $this->clienteService->crearCliente($request->all());

        return redirect()->route('clientes.index')
                         ->with('success', 'Cliente creado exitosamente.');
    }

    public function show($id)
    {
        $cliente = $this->clienteService->obtenerCliente($id);
        return view('clientes.show', compact('cliente'));
    }

    public function edit($id)
    {
        $cliente = $this->clienteService->obtenerCliente($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:clientes,email,' . $id,
            'telefono' => 'required',
        ]);

        $cliente = $this->clienteService->obtenerCliente($id);
        $this->clienteService->actualizarCliente($cliente, $request->all());

        return redirect()->route('clientes.index')
                         ->with('success', 'Cliente actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $cliente = $this->clienteService->obtenerCliente($id);
        $this->clienteService->desactivarCliente($cliente);

        return redirect()->route('clientes.index')
                         ->with('success', 'Cliente desactivado exitosamente.');
    }
}
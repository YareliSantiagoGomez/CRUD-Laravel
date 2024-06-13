<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cliente;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //public function __construct(){
      //  $this->middleware('auth');
     //}
 
     //public function __construct(){
       //  $this->middleware('auth', ['except' => 'index']);
     //}
 
     public function __construct(){
         $this->middleware('admin', ['except' => 'index']);
     }

    public function index(Request $request)
    {
       // $clientes = Cliente::all();
      //  return view('clientes.index', ['clientes' => $clientes]);
      $query = Cliente::query();

      if ($request->has('buscarCliente')) {
          $search = $request->input('buscarCliente');
          $query->where('nombre', 'like', "%{$search}%");
      }
  
      $clientes = $query->simplePaginate(3);
      return view('clientes.index', compact('clientes'));


        //$clientes= Cliente::simplepaginate(3);
        //return view('clientes.index', compact('clientes'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|unique:clientes',
            'rfc' => 'required|unique:clientes',
            'direccion' => 'required|unique:clientes',
            'telefono' => 'required|unique:clientes',
            'email' => 'required|unique:clientes',
        ]);

        $cliente = Cliente::create([
            'nombre' => $request->input('nombre'),
            'rfc' => $request->input('rfc'),
            'direccion' => $request->input('direccion'),
            'telefono' => $request->input('telefono'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('clientes.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cliente = Cliente::find($id);
        return view('clientes.editar', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nombre' => 'required|unique:clientes,nombre,' . $id,
            'rfc' => 'required|unique:clientes,rfc,' . $id,
            'direccion' => 'required|unique:clientes,direccion,' . $id,
            'telefono' => 'required|unique:clientes,telefono,' . $id,
            'email' => 'required|unique:clientes,email,' . $id,
        ]);

        $cliente = Cliente::find($id);
        $cliente->nombre = $request->input('nombre');
        $cliente->rfc = $request->input('rfc');
        $cliente->direccion = $request->input('direccion');
        $cliente->telefono = $request->input('telefono');
        $cliente->email = $request->input('email');
        $cliente->save();

        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();

        return redirect()->route('clientes.index');
    }
}
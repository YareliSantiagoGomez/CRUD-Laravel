<?php

namespace App\Http\Controllers;

use App\Mail\FacturaCreada;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Factura;
use App\Models\Cliente;
use App\Models\FormaPago;
use App\Models\EstadoFactura;


class FacturaController extends Controller
{

    //public function __construct(){
      //  $this->middleware('auth');
    //}

    //public function __construct(){
      //  $this->middleware('auth', ['except' => 'index']);
    //}

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin', ['except' => 'index']);
    }


    public function index(Request $request)
    {
      //  $noFactura=101010;
      //Mail::to('yareg5116@gmail.com')->send(new FacturaCreada($noFactura));

        $query = Factura::query();

        if ($request->has('buscarFactura')) {
            $search = $request->input('buscarFactura');
            $query->where('id', 'like', "%{$search}%");
        }

   
        $facturas = $query->simplePaginate(3);
        
        return view('facturas.index', compact('facturas'));

    
    }
        /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     $clientes = Cliente::orderBy('nombre','asc') ->pluck('nombre','id');  
     $formaspago = FormaPago::orderBy('nombre','asc') ->pluck('nombre','id'); 
    $estadosfacturas = EstadoFactura::orderBy('nombre','asc') ->pluck('nombre','id');
   
   
    return view('facturas.crear', compact('clientes', 'formaspago','estadosfacturas'));
        
    }
/**
 * Store a newly created resource in storage.
 */
public function store(Request $request)
{
    $this->validate($request, [
        'nombre' => 'required',
        'detalles' => 'required',
        'valor' => 'required',
        'archivo' => 'mimes:jpeg,png',
        'idcliente' => 'required',
        'idforma' => 'required',
        'idestado' => 'required' 
    ]);

     //Cambia el nombre y guarda el archivo
     $now = new \DateTime();
     $fecha = $now->format('Ymd-His');
     $nombre = $request->get('nombre');
     $archivo = $request->file('archivo');
     $nom = "";


     if($archivo){
         $extension = $archivo->getClientOriginalExtension();
         $nom = "factura-".$nombre."-".$fecha.".".$extension;
         \Storage::disk('local')->put($nom, \File::get($archivo));
     }

    $factura = Factura::create([
        'nombre' => $request->get('nombre'),
        'detalles' => $request->get('detalles'),
        'valor' => $request->get('valor'),
        'archivo' => $nom,
        'idcliente' => $request->get('idcliente'),
        'idforma' => $request->get('idforma'),
        'idestado' => $request->get('idestado'),
    ]);

    $numerofactura=$request->get('nombre');
    $valorfactura=$request->get('valor');

    $emailto = Auth::user()->email;
    Mail::to($emailto)->send(new FacturaCreada($numerofactura,$valorfactura));

    return redirect()->route('facturas.index');
}

    
     /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $facturas = Factura::find($id);
        $clientes = Cliente::orderBy('nombre','asc') ->pluck('nombre','id');  
        $formaspago = FormaPago::orderBy('nombre','asc') ->pluck('nombre','id'); 
        $estadosfacturas = EstadoFactura::orderBy('nombre','asc') ->pluck('nombre','id');

        return view('facturas.editar', compact ('facturas', 'clientes', 'formaspago','estadosfacturas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $this->validate($request, [
            'nombre' => 'required' ,
            'detalles' => 'required',
            'valor' => 'required' ,
            'archivo' => 'mimes:jpeg,png',
            'idcliente' => 'required',
            'idforma' => 'required' ,
            'idestado' => 'required',
        ]);
        
         //Cambia el nombre y guarda el archivo
        $now = new \DateTime();
        $fecha = $now->format('Ymd-His');
        $nombre = $request->get('nombre');
        $archivo = $request->file('archivo');
        $nom = "";


        if($archivo){
            $extension = $archivo->getClientOriginalExtension();
            $nom = "factura-".$nom."-".$fecha.".".$extension;
            \Storage::disk('local')->put($nom, \File::get($archivo));
        }

        $factura = factura::find($id);
        $factura->nombre = $request->get("nombre");
        $factura->detalles = $request->get("detalles");
        $factura->valor = $request->get("valor");
        if($archivo){
            $factura->archivo = $nom;
        }
        $factura->idcliente = $request->get("idcliente");
        $factura->idforma = $request->get("idforma");
        $factura->idestado = $request->get("idestado");

        $factura->save();

        return redirect()->route('facturas.index');
    }

     /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $factura = Factura::find($id);
        $factura->delete();

        return redirect()->route('facturas.index');
        }
}

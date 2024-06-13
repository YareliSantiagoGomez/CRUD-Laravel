<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Perfil;

class PerfilesController extends Controller
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
        // consultas personalizas accediendo directamente a las tablas
        //$perfiles = Perfil::all();
        //return view('perfiles.index',['perfiles' => $perfiles]);
       // $perfiles=Perfil::simplepaginate(3);
        //return view('perfiles.index', compact('perfiles'));

        $query = Perfil::query();

        if ($request->has('buscarPerfil')) {
            $search = $request->input('buscarPerfil');
            $query->where('nombre', 'like', "%{$search}%");
        }
    
        $perfiles = $query->simplePaginate(3);
        return view('perfiles.index', compact('perfiles'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('perfiles.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,['nombre' => 'required|unique:perfiles']);
        //
        $perfil = Perfil::create(['nombre' => $request->get('nombre')]);
        return redirect()->route('perfiles.index');
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
    public function edit(string $id)
    {
        $perfil = Perfil::find($id);
        return view('perfiles.editar',compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nombre' => 'required|unique:perfiles'
            //mas validaciones si se require
            //'nombre', mas campos
        ]);

        $perfil = Perfil::find($id);
        $perfil -> nombre = $request->get("nombre");
        $perfil -> save();

        return redirect()->route('perfiles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $perfil = Perfil::find($id);
        $perfil->delete();

        return redirect()->route('perfiles.index');
    }
}

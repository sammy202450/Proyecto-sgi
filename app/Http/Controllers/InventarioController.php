<?php

namespace App\Http\Controllers;

use App\Models\inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $inv = inventario::where('activo',1)->get();
        

        return view('inventario.index',['inventro' => $inv]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('inventario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        /*inventario::create($request->only([
            'codigo',
            'equipo',
            'modelo',
            'serie',
            'marca',
            'descripcion',
            'cantidad',
            'nota',
            'fecha_compra',
            'status' => 1
        ]));*/
        $request->validate([
            'codigo' => 'required|max:7|unique:inventarios',
            'equipo' => 'required',
            'modelo' => 'required',
            'serie' => 'required',
            'marca' => 'required',
            'descripcion' => 'required',
            'cantidad' => 'required',
            'nota' => 'required',
            'fecha_compra' => 'required',
            'depto' => 'required',
            'resp' => 'required',
            'imagen' => 'required|image|mimes:png,jpg|max:5000'
        ]);

        $inv = new inventario;
        $inv->codigo = $request->codigo;
        $inv->equipo = $request->equipo;
        $inv->modelo = $request->modelo;
        $inv->serie = $request->serie;
        $inv->marca = $request->marca;
        $inv->descripcion = $request->descripcion;
        $inv->cantidad = $request->cantidad;
        $inv->nota = $request->nota;
        $inv->fecha_compra = $request->fecha_compra;
        $inv->oficina = $request->oficina;
        $inv->departamento = $request->depto;
        $inv->responsable = $request->resp;
        $file = $request->file('imagen');
        $name= $file->getClientOriginalName();
        //$rutaimagen = $file->storeAs('imagenes',$name,['disk' => 'public']);
        $rutaimg = $file->store('imagenes',['disk' => 'public']);
        $inv->imagen = $rutaimg;
        $inv->status = 1;
        $inv->activo = 1;
        $inv->save();
        $inv = inventario::where('activo',1)->get();
        return view('inventario.index',['inventro' => $inv]);


    }

    /**
     * Display the specified resource.
     */
    public function show(inventario $inventario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id,inventario $inventario)
    {
        //
       
        $inv= inventario::find($id);
        return view('inventario.edit',['inv' => $inv]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $request->validate([
            'codigo' => 'required|max:7|unique:inventarios,codigo,'.$id,
            'equipo' => 'required',
            'modelo' => 'required',
            'serie' => 'required',
            'marca' => 'required',
            'descripcion' => 'required',
            'cantidad' => 'required',
            'nota' => 'required',
            'fecha_compra' => 'required',
            'oficina' => 'required',
            'depto' => 'required',
            'resp' => 'required',
            'imagen' => 'image|mimes:png,jpg|max:5000',
        ]);
        $inv = inventario::find($request->id);
        $inv->codigo = $request->codigo;
        $inv->equipo = $request->equipo;
        $inv->modelo = $request->modelo;
        $inv->serie = $request->serie;
        $inv->marca = $request->marca;
        $inv->descripcion = $request->descripcion;
        $inv->cantidad = $request->cantidad;
        $inv->nota = $request->nota;
        $inv->fecha_compra = $request->fecha_compra;
        $inv->oficina = $request->oficina;
        $inv->departamento = $request->depto;
        $inv->responsable = $request->resp;
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $rutaimg = $file->store('imagenes',['disk' => 'public']);
            $inv->imagen = $rutaimg;
        }
        $inv->save();

        $inv = inventario::where('activo',1)->get();
        return view('inventario.index',['inventro' => $inv]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $inv = inventario::find($id);
        $inv->activo = 0;
        $inv->save();

        $inv = inventario::where('activo',1)->get();
        $msg = "El equipo se ha eliminado satisfactoriamente";
        return view('inventario.index',['inventro' => $inv, 'msg' => $msg ]);
    }
}

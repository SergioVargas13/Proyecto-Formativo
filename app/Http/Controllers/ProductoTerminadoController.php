<?php

namespace App\Http\Controllers;

use App\producto_terminado;
use Illuminate\Http\Request;

class ProductoTerminadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['producto_terminado']=producto_terminado::paginate(4);
        return view('producto_terminado.index',$datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('producto_terminado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       $producto_terminado= new Producto_terminado();
       $producto_terminado->id=$request->id;
       $producto_terminado->Nombre=$request->Nombre;
       $producto_terminado->Precio=$request->Precio;
       $producto_terminado->Descripcion=$request->Descripcion;
       $producto_terminado->save();
       return redirect()->route('producto_terminado.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\producto_terminado  $producto_terminado
     * @return \Illuminate\Http\Response
     */
    public function show(producto_terminado $producto_terminado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\producto_terminado  $producto_terminado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $producto_terminado = Producto_terminado::find($id);
        return view('producto_terminado.edit',['producto_terminado'=>$producto_terminado]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\producto_terminado  $producto_terminado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $producto_terminado = Producto_terminado::find($id);
        $producto_terminado->Nombre=$request->Nombre;
        $producto_terminado->Precio=$request->Precio;
        $producto_terminado->Descripcion=$request->Descripcion;
        $producto_terminado->save();
        return redirect()->route('producto_terminado.index');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\producto_terminado  $producto_terminado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $producto_terminado = Producto_terminado::find($id);
        $producto_terminado->delete();
        return redirect()->route('producto_terminado.index');

    }
}

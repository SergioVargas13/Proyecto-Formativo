<?php

namespace App\Http\Controllers;

use App\materia_prima;
use Illuminate\Http\Request;

class materia_primaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $materia_prima = materia_prima::all();
        return view('materia_prima.index',["materia_prima"=>$materia_prima]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('materia_prima.create');
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
        $materia_prima= new materia_prima();
        $materia_prima->id=$request->id;
        $materia_prima->nombre=$request->nombre;
        $materia_prima->cantidad=$request->cantidad;
        $materia_prima->costo=$request->costo;
        $materia_prima->unidadmedida=$request->unidadmedida;
        $materia_prima->save();
        return redirect()->route('materia_prima.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $materia_prima = materia_prima::find($id);
        return view('materia_prima.show',['materia_prima'=>$materia_prima]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $materia_prima = materia_prima::find($id);
        return view('materia_prima.edit',['materia_prima'=>$materia_prima]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
       $materia_prima = materia_prima::find($id);
       $materia_prima->id=$request->id;
       $materia_prima->nombre=$request->nombre;
       $materia_prima->cantidad=$request->cantidad;
       $materia_prima->costo=$request->costo;
       $materia_prima->unidadmedida=$request->unidadmedida;
       $materia_prima->save();
        return redirect()->route('materia_prima.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $materia_prima = materia_prima::find($id);
        $materia_prima->delete();
        return redirect()->route('materia_prima.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\mano_de_obra;
use Illuminate\Http\Request;

class ManoDeObraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['mano_de_obra']=mano_de_obra::paginate(4);
        return view('mano_de_obra.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('mano_de_obra.create');
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
        $mano_de_obra= new mano_de_obra();
        $mano_de_obra->id=$request->id;
        $mano_de_obra->tipo_labor=$request->tipo_labor;
        $mano_de_obra->tiempo=$request->tiempo;
        $mano_de_obra->costo=$request->costo;
        $mano_de_obra->save();
        return redirect()->route('mano_de_obra.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\mano_de_obra  $mano_de_obra
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $mano_de_obra = mano_de_obra::find($id);
        return view('mano_de_obra.show',['mano_de_obra'=>$mano_de_obra]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mano_de_obra  $mano_de_obra
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $mano_de_obra = mano_de_obra::find($id);
        return view('mano_de_obra.edit',['mano_de_obra'=>$mano_de_obra]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\mano_de_obra  $mano_de_obra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
       $mano_de_obra = mano_de_obra::find($id);
       $mano_de_obra->id=$request->id;
       $mano_de_obra->tipo_labor=$request->tipo_labor;
       $mano_de_obra->tiempo=$request->tiempo;
       $mano_de_obra->costo=$request->costo;
       $mano_de_obra->save();
       return redirect()->route('mano_de_obra.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mano_de_obra  $mano_de_obra
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $mano_de_obra = mano_de_obra::find($id);
        $mano_de_obra->delete();
        return redirect()->route('mano_de_obra.index');
    }
}

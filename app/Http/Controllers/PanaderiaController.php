<?php

namespace App\Http\Controllers;

use App\panaderia;
use Illuminate\Http\Request;

class PanaderiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['panaderia']=panaderia::paginate(5);
        return view('panaderia.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('panaderia.create');
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
       // $datospanaderia=request()->all();

        $datospanaderia=request()->except('_token');

        panaderia::insert($datospanaderia);

        //return response()->json($datospanaderia);
        return redirect('panaderia')->with('Mensaje','Infomacion agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\panaderia  $panaderia
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
       ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\panaderia  $panaderia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $panaderia= panaderia::findOrFail($id);

        return view('panaderia.edit',compact('panaderia'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\panaderia  $panaderia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datospanaderia=request()->except(['_token','_method']);
        panaderia::where('id','=',$id)->update($datospanaderia);

        //$panaderia= panaderia::findOrFail($id);
        //return view('panaderia.edit',compact('panaderia'));

        return redirect('panaderia')->with('Mensaje','Informacion modificada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\panaderia  $panaderia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        panaderia::destroy($id);

        return redirect('panaderia')->with('Mensaje','Informacion eliminada con éxito');
    }
}


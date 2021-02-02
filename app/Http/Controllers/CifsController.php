<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cifs;

class CifsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cifs=Cifs::all();
        return view('cifs.index',["cifs"=>$cifs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cifs.create');
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
       $cifs= new Cifs();
       $cifs->id=$request->id;
       $cifs->Nombre=$request->Nombre;
       $cifs->Precio=$request->Precio;
       $cifs->Descripcion=$request->Descripcion;
       $cifs->save();
       return redirect()->route('cifs.index');
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
        $cifs = Cifs::find($id);
        return view('cifs.edit',['cifs'=>$cifs]);
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
        $cifs = Cifs::find($id);
        $cifs->Nombre=$request->Nombre;
        $cifs->Precio=$request->Precio;
        $cifs->Descripcion=$request->Descripcion;
        $cifs->save();
        return redirect()->route('cifs.index');
 
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
        $cifs = Cifs::find($id);
        $cifs->delete();
        return redirect()->route('cifs.index');

    }
}

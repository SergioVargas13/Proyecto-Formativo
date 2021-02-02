<?php

namespace App\Http\Controllers;

use App\Gestion_usuario;
use Illuminate\Http\Request;

class Gestion_usuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        //
        $gestion_usuarios = Gestion_usuario::all();
        return view('gestion_usuario.index',["gestion_usuarios"=>$gestion_usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('gestion_usuario.create');
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
       $gestion_usuario= new Gestion_usuario();
       $gestion_usuario->documento=$request->documento;
       $gestion_usuario->nombre=$request->nombre;
       $gestion_usuario->salario=$request->salario;
       $gestion_usuario->telefono=$request->telefono;
       $gestion_usuario->save();
       return redirect()->route('gestion_usuario.index');

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
        $gestion_usuario = Gestion_usuario::find($id);
        return view('gestion_usuario.show',['gestion_usuario'=>$gestion_usuario]);
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
        $gestion_usuario = Gestion_usuario::find($id);
        return view('gestion_usuario.edit',['gestion_usuario'=>$gestion_usuario]);
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
       $gestion_usuario = Gestion_usuario::find($id);
       $gestion_usuario->documento=$request->documento;
       $gestion_usuario->nombre=$request->nombre;
       $gestion_usuario->salario=$request->salario;
       $gestion_usuario->telefono=$request->telefono;
       $gestion_usuario->save();
       return redirect()->route('gestion_usuario.index');
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
        $gestion_usuario = Gestion_usuario::find($id);
        $gestion_usuario->delete();
        return redirect()->route('gestion_usuario.index');
    }

}

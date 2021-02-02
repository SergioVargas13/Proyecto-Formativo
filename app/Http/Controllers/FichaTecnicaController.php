<?php

namespace App\Http\Controllers;

use App\ficha_tecnica;
use App\materia_prima;
use App\mano_de_obra;
use Illuminate\Http\Request;

class FichaTecnicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ficha_tecnica = ficha_tecnica::all();
        return view('ficha_tecnica.index',["ficha_tecnica"=>$ficha_tecnica]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ficha_tecnica.create');
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
        $ficha_tecnica= new ficha_tecnica();
        $ficha_tecnica->id=$request->id;
        $ficha_tecnica->Num_Unidades=$request->Num_Unidades;
        $ficha_tecnica->tiempo=$request->tiempo;
        $ficha_tecnica->descripcion=$request->descripcion;
        $ficha_tecnica->save();
        return redirect()->route('ficha_tecnica.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ficha_tecnica  $ficha_tecnica
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $ficha_tecnica = ficha_tecnica::find($id);
        return view('ficha_tecnica.show',['ficha_tecnica'=>$ficha_tecnica]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ficha_tecnica  $ficha_tecnica
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $ficha_tecnica = ficha_tecnica::find($id);
        return view('ficha_tecnica.edit',['ficha_tecnica'=>$ficha_tecnica]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ficha_tecnica  $ficha_tecnica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $ficha_tecnica = ficha_tecnica::find($id);
        $ficha_tecnica->id=$request->id;
        $ficha_tecnica->Num_Unidades=$request->Num_Unidades;
        $ficha_tecnica->tiempo=$request->tiempo;
        $ficha_tecnica->descripcion=$request->descripcion;
        $ficha_tecnica->save();
        return redirect()->route('ficha_tecnica.index');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ficha_tecnica  $ficha_tecnica
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $ficha_tecnica = ficha_tecnica::find($id);
        $ficha_tecnica->delete();
        return redirect()->route('ficha_tecnica.index');

    }
   public function deleteMateriaPrima($ficha_tecnica_id, $materia_prima_id){
          $ficha_tecnica = ficha_tecnica::find($ficha_tecnica_id);
          $ficha_tecnica->materias_primas()->detach($materia_prima_id);
          return redirect()->route('ficha_tecnica.show',['ficha_tecnica'=>$ficha_tecnica_id]);
   }

   public function addMateriaPrima($ficha_tecnica_id){
          $ficha_tecnica = ficha_tecnica::find($ficha_tecnica_id);
          $ids = $ficha_tecnica->materias_primas->pluck('id')->toArray();
          $materias_primas = materia_prima::whereNotIn('id', $ids)->get();
          return view('ficha_tecnica.lista_materias_primas',
          ['ficha_tecnica_id'=>$ficha_tecnica_id, 'materias_primas'=>$materias_primas]);
   }

   public function saveMateriaPrima(Request $request){
       $ficha_tecnica_id=$request->ficha_tecnica_id;
       $ficha_tecnica= ficha_tecnica::find($ficha_tecnica_id);
       if ($request->materia_prima_id){
        $ficha_tecnica->materias_primas()->attach($request->materia_prima_id,array('cantidad'=>$request->cantidad,'tipoMP'=>$request->tipoMP));
           
       }
       return redirect()->route('ficha_tecnica.show',['ficha_tecnica'=>$ficha_tecnica_id]);
   }
   public function deleteManoObra($ficha_tecnica_id, $mano_de_obra_id){
    $ficha_tecnica = ficha_tecnica::find($ficha_tecnica_id);
    $ficha_tecnica->mano_obras()->detach($mano_de_obra_id);
    return redirect()->route('ficha_tecnica.show',['ficha_tecnica'=>$ficha_tecnica_id]);
}
   public function addManoObra($ficha_tecnica_id){
    $ficha_tecnica = ficha_tecnica::find($ficha_tecnica_id);
    $ids = $ficha_tecnica->mano_obras->pluck('id')->toArray();
    $mano_obras = mano_de_obra::whereNotIn('id', $ids)->get();
    return view('ficha_tecnica.lista_mano_obras',
    ['ficha_tecnica_id'=>$ficha_tecnica_id, 'mano_obras'=>$mano_obras]);
}
public function saveManoObra(Request $request){
    $ficha_tecnica_id=$request->ficha_tecnica_id;
    $ficha_tecnica= ficha_tecnica::find($ficha_tecnica_id);
    if ($request->mano_de_obra_id){
            $ficha_tecnica->mano_obras()->attach($request->mano_de_obra_id,array('cantidad_tiempo'=>$request->cantidad_tiempo,'tipoMO'=>$request->tipoMO));
    }
    return redirect()->route('ficha_tecnica.show',['ficha_tecnica'=>$ficha_tecnica_id]);
  }
  public function calcularCosto($ficha_tecnica_id){
    $ficha_tecnica = ficha_tecnica::find($ficha_tecnica_id);
    return view('ficha_tecnica.hoja_calculo',
          ['ficha_tecnica'=>$ficha_tecnica]);
  }
}     
    
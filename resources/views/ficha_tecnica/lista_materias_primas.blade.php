@extends('adminlte::page')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

            @if (Auth::user()->tieneRole('Super Administrador'))
                <form method="POST" action="{{ action('FichaTecnicaController@saveMateriaPrima') }}">
               
               <br>   
                @csrf
                    <input type="hidden" name="ficha_tecnica_id" value="{{ $ficha_tecnica_id }}" />
                    <table class="table table-light table-hover">

                        <thead class="thead-light">
                            <tr>
                                <th>Materia Prima</th>
                                <th>Cantidad</th>
                                <th>Tipo de Materia Prima</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                <select name="materia_prima_id">
                                  @foreach($materias_primas as $mp) 
                                   <option value="{{ $mp->id }}">
                                   {{ $mp->nombre }}
                                   </option>
                                  @endforeach
                                </select>
                                 </td>

                                <td> <input name="cantidad" type="number" step="any" /></td>
                                <td> <select name="tipoMP">
                                   <option value="directa">
                                    directa
                                   </option>
                                   <option value="indirecta">
                                    indirecta
                                   </option>
                                </select> 
                            </td>

                            </tr>
                        
                            <tr>
                                <td colspan="5">
                                <input class="btn btn-success" type="submit" value="Guardar" />
                                    <a class="btn btn-dark" href="{{ route('ficha_tecnica.show',['ficha_tecnica'=>$ficha_tecnica_id]) }}">Volver a la ficha</a><br>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
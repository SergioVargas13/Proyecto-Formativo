@extends('adminlte::page')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

            @if (Auth::user()->tieneRole('Super Administrador'))
                <form method="POST" action="{{ action('FichaTecnicaController@saveManoObra') }}">
                    <br>
                    @csrf
                    <input type="hidden" name="ficha_tecnica_id" value="{{ $ficha_tecnica_id }}" />
                    <table class="table table-light table-hover">

                        <thead class="thead-light">
                            <tr>
                                <th>Mano de Obra</th>
                                <th>Cantidad de Tiempo</th>
                                <th>Tipo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select name="mano_de_obra_id">
                                        @foreach($mano_obras as $mo)
                                        <option value="{{ $mo->id }}">
                                            {{ $mo->tipo_labor }}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td> <input name="cantidad_tiempo" type="number" min="1" /></td>
                                <td> <select name="tipoMO">
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
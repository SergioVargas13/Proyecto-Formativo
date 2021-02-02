@extends('adminlte::page')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            
                
            
                <table>
                    <tr>
                        <td>
                            
                            @if (Auth::user()->tieneRole('Super Administrador'))
                            <a class="btn btn-primary" href="{{ route('ficha_tecnica.addMateriaPrima',['ficha_tecnica_id'=>$ficha_tecnica->id])}}">Agregar Materia Prima</a>
                            @endif
                            @if (Auth::user()->tieneRole('Panadero'))
                            <a class="btn btn-primary" href="{{ route('ficha_tecnica.addMateriaPrima',['ficha_tecnica_id'=>$ficha_tecnica->id])}}">Materia Prima</a>
                            @endif
                            @if (Auth::user()->tieneRole('Super Administrador'))
                            <a class="btn btn-primary" href="{{ route('ficha_tecnica.addManoObra',['ficha_tecnica_id'=>$ficha_tecnica->id])}}">Agregar Mano de Obra</a>
                            @endif
                            <a class="btn btn-primary" href="{{ route('ficha_tecnica.calcularCosto',['ficha_tecnica_id'=>$ficha_tecnica->id])}}">Calcular Costo</a>
                            <a class="btn btn-dark" href="{{ route('ficha_tecnica.index') }}">Volver</a> <br><br>
                        </td>
                    </tr>
                </table>
                <h1>Ficha Tecnica</h1>
                
                <table class="table table-light table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Codigo</th>
                            <th>Capacidad de Producción</th>
                            <th>Tiempo Promedio de Fabricación</th>
                            <th>Descripción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $ficha_tecnica->id }}</td>
                            <td> {{ $ficha_tecnica->Num_Unidades }}</td>
                            <td>{{ $ficha_tecnica->tiempo }}</td>
                            <td>{{ $ficha_tecnica->descripcion }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <h1>Lista de Materia prima de la ficha</h1>
                 <table class="table table-light table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Costo</th>
                            <th>Unidad de Medida</th>
                            <th>Tipo Materia Prima</th>
                            @if (Auth::user()->tieneRole('Super Administrador'))
                            <th>Opciones</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ficha_tecnica->materias_primas as $mp)
                        <tr>
                            <td>{{$mp->id}}</td>
                            <td>{{$mp->nombre}}</td>
                            <td>{{$mp->pivot->cantidad}}</td>
                            <td>{{$mp->costo*$mp->pivot->cantidad}}</td>
                            <td>{{$mp->unidadmedida}}</td>
                            <td>{{$mp->pivot->tipoMP}}</td>
                            @if (Auth::user()->tieneRole('Super Administrador'))
                            <td>
                                <form method="POST" action="{{ route('ficha_tecnica.deleteMateriaPrima',['ficha_tecnica_id'=>$ficha_tecnica->id, 'materia_prima_id'=>$mp->id ] ) }}">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Desea eliminar esta materia prima de la Ficha?');" value="Eliminar">
                                </form>
                                @endif
                        </tr>
                        @endforeach
                    </tbody>
                    <br>
                </table>
                <br><br><br><br><br><br>
                <h1>Lista de Mano de Obra de la ficha</h1>
                <table class="table table-light table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Id</th>
                            <th>Tipo de Labor</th>
                            <th>Cantidad de Tiempo</th>
                            <th>Costo</th>
                            <th>Tipo Mano de Obra</th>
                            @if (Auth::user()->tieneRole('Super Administrador'))
                            <th>Opciones</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ficha_tecnica->mano_obras as $mo)
                        <tr>
                            <td>{{$mo->id}}</td>
                            <td>{{$mo->tipo_labor}}</td>
                            <td>{{$mo->pivot->cantidad_tiempo}}</td>
                            <td>{{$mo->costo*$mo->pivot->cantidad_tiempo}}</td>
                            <td>{{$mo->pivot->tipoMO}}</td>
                            @if (Auth::user()->tieneRole('Super Administrador'))
                            <td>
                                <form method="POST" action="{{ route('ficha_tecnica.deleteManoObra',['ficha_tecnica_id'=>$ficha_tecnica->id, 'mano_de_obra_id'=>$mo->id ] ) }}">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Desea eliminar esta mano de obra de la Ficha?');" value="Eliminar">
                                </form>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                        @endsection
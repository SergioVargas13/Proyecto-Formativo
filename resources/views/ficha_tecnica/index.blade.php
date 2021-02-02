@extends('adminlte::page')

@section('title','Ficha Tecnica')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @if (Auth::user()->tieneRole('Super Administrador'))
                <table>
                    <tr>
                        <td>
                        <a class="btn btn-success" href="{{ route('ficha_tecnica.create') }}">Agregar Ficha Tecnica</a>
                            <a class="btn btn-dark" href="{{ route('home') }}">Volver al Home</a>
                        </td>
                    </tr>
                </table>
                <br>
                @endif
                @if (Auth::user()->tieneRole('Panadero '))
                <table>
                    <tr>
                        <td>
                        <a class="btn btn-success" href="{{ route('ficha_tecnica.create') }}">Agregar Ficha Tecnica</a>
                            <a class="btn btn-dark" href="{{ route('home') }}">Volver al Home</a>
                        </td>
                    </tr>
                </table>
                <br>
                @endif
            

                <table class="table table-light table-hover">

                    <thead class="thead-light" >

                        <tr>
                            <th>Codigo</th>
                            <th>Capacidad de Producción</th>
                            <th>Tiempo Promedio de Fabricación</th>
                            <th>Descripción</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ficha_tecnica as $f)
                        <tr>
                            <td>{{ $f->id }}</td>
                            <td>{{ $f->Num_Unidades }}</td>
                            <td>{{ $f->tiempo }}</td>
                            <td>{{ $f->descripcion }}</td>
                            <td>
                                @if (Auth::user()->tieneRole('Super Administrador'))
                                <form method="get" action="{{ route('ficha_tecnica.show',['ficha_tecnica'=>$f->id]) }}">
                                    <input class="btn btn-primary" type="submit" value="ver">
                                </form>
                                <form method="get" action="{{ route('ficha_tecnica.edit',['ficha_tecnica'=>$f->id]) }}">
                                    <input class="btn btn-warning" type="submit" value="Editar">
                                </form>
                                <form method="post" action="{{ route('ficha_tecnica.destroy',['ficha_tecnica'=>$f->id]) }}">
                                    @csrf
                                    {{ method_field('delete') }}
                                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Desea eliminar esta Ficha Tecnica?');" value="Eliminar">
                                </form>
                               @endif
                               @if (Auth::user()->tieneRole('Auxiliar'))
                               <form method="get" action="{{ route('ficha_tecnica.show',['ficha_tecnica'=>$f->id]) }}">
                                    <input class="btn btn-primary" type="submit" value="ver">
                                </form>
                                @endif
                               @if (Auth::user()->tieneRole('Panadero'))
                               <form method="get" action="{{ route('ficha_tecnica.show',['ficha_tecnica'=>$f->id]) }}">
                                    <input class="btn btn-primary" type="submit" value="ver">
                                </form>
                                <form method="get" action="{{ route('ficha_tecnica.edit',['ficha_tecnica'=>$f->id]) }}">
                                    <input class="btn btn-warning" type="submit" value="Editar">
                                </form>
                               @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection

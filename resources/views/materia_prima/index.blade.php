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
                        <a class="btn btn-success" href="{{ route('materia_prima.create') }}">Agregar Materia Prima</a>
                        @endif   
                        <a class="btn btn-dark" href="{{ route('home') }}">Volver al Home</a>
                        </td>
                    </tr>
                </table>
                <br>

                <table class="table table-light table-hover">

                    <thead class="thead-light" >

                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Costo</th>
                            <th>Unidad de Medida</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($materia_prima as $mp)
                        <tr>
                            <td>{{ $mp->id }}</td>
                            <td>{{ $mp->nombre }}</td>
                            <td>{{ $mp->cantidad }}</td>
                            <td>{{ $mp->costo }}</td>
                            <td>{{ $mp->unidadmedida }}</td>
                            <td>
                                 @if (Auth::user()->tieneRole('Super Administrador'))
                                <form method="get" action="{{ route('materia_prima.show',['materia_prima'=>$mp->id]) }}">
                                    <input class="btn btn-primary" type="submit" value="ver">
                                </form>
                                <form method="get" action="{{ route('materia_prima.edit',['materia_prima'=>$mp->id]) }}">
                                    <input class="btn btn-warning" type="submit" value="Editar">
                                </form>
                                <form method="post" action="{{ route('materia_prima.destroy',['materia_prima'=>$mp->id]) }}">
                                    @csrf
                                    {{ method_field('delete') }}
                                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Desea eliminar esta materia prima?');" value="Eliminar">
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

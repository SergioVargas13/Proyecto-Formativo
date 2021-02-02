@extends('adminlte::page')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                
                <table>
                    <tr>
                        <td>
                            <a class="btn btn-dark" href="{{ route('home') }}">Volver al Home</a>
                            @if (Auth::user()->tieneRole('Super Administrador'))
                            <a class="btn btn-success" href="{{ route('gestion_usuario.create') }}">Agregar Usuario</a>
                            
                        </td>
                    </tr>
                </table>
                <br>
                @endif

                <table class="table table-light table-hover">

                    <thead class="thead-light" >
                        <tr>
                            <th>Id</th>
                            <th>Documento</th>
                            <th>Nombre</th>
                            <th>Salario</th>
                            <th>Telefono</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($gestion_usuarios as $g)
                        <tr>
                            <td>{{ $g->id }}</td>
                            <td>{{ $g->documento }}</td>
                            <td>{{ $g->nombre }}</td>
                            <td>{{ $g->salario }}</td>
                            <td>{{ $g->telefono }}</td>
                            <td>

                                @if (Auth::user()->tieneRole('Super Administrador'))
                                <form method="get" action="{{ route('gestion_usuario.show',['gestion_usuario'=>$g->id]) }}">
                                    <input class="btn btn-primary" type="submit" value="Ver">
                                </form>
                                <form method="get" action="{{ route('gestion_usuario.edit',['gestion_usuario'=>$g->id]) }}">
                                    <input class="btn btn-warning" type="submit" value="Editar">
                                </form>
                                <form method="post" action="{{ route('gestion_usuario.destroy',['gestion_usuario'=>$g->id]) }}">
                                    @csrf
                                    {{ method_field('delete') }}
                                    <input  class="btn btn-danger" type="submit"  onclick="return confirm('¿Desea eliminar?');" value="Eliminar">
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
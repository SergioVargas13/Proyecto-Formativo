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
                        <a class="btn btn-success" href="{{ route('mano_de_obra.create') }}">Agregar Mano de obra</a>
                        @endif  
                        <a class="btn btn-dark" href="{{ route('home') }}">Volver al Home</a>
                        </td>
                    </tr>
                </table>
                <br>

            

                <table class="table table-light table-hover">

                    <thead class="thead-light" >

                        <tr>
                            <th>Id</th>
                            <th>Tipo de labor</th>
                            <th>Tiempo</th>
                            <th>Costo</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mano_de_obra as $mo)
                        <tr>
                            <td>{{ $mo->id }}</td>
                            <td>{{ $mo->tipo_labor }}</td>
                            <td>{{ $mo->tiempo }}</td>
                            <td>{{ $mo->costo }}</td>
                            <td>
                            @if (Auth::user()->tieneRole('Super Administrador'))
                                <form method="get" action="{{ route('mano_de_obra.show',['mano_de_obra'=>$mo->id]) }}">
                                    <input class="btn btn-primary" type="submit" value="ver">
                                </form>
                                <form method="get" action="{{ route('mano_de_obra.edit',['mano_de_obra'=>$mo->id]) }}">
                                    <input class="btn btn-warning" type="submit" value="Editar">
                                </form>
                                <form method="post" action="{{ route('mano_de_obra.destroy',['mano_de_obra'=>$mo->id]) }}">
                                    @csrf
                                    {{ method_field('delete') }}
                                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Desea eliminar la mano de obra?');" value="Eliminar">
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

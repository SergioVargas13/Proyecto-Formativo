@extends('adminlte::page')

@section('content')

<div class="container">

    @if(Session::has('Mensaje')) {{
    Session::get('Mensaje')
}}
    @endif
    
  
                    
    <table>
        <tr>
            <td>
                
                <a class="btn btn-dark" href="{{ route('home') }}">Volver al Home</a>
                <a class="btn btn-success" href="{{ url('panaderia/create')}}">Agregar Informacion</a>
                @if (Auth::user()->tieneRole('Super Administrador'))
            </td>
        </tr>
    </table>
    <br>
    @endif
    <table class="table table-light table-hover">

        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>NIT</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Productos</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($panaderia as $panaderia)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$panaderia->NIT}}</td>
                <td>{{$panaderia->Nombre}}</td>
                <td>{{$panaderia->Telefono}}</td>
                <td>{{$panaderia->Direccion}}</td>
                <td>{{$panaderia->Productos}}</td>
                <td>

                    <a href="{{ url('/panaderia/'.$panaderia->id.'/edit')}}" class="btn btn-warning">
                        Editar
                    </a>
                    <form method="post" action="{{ url('/panaderia/'.$panaderia->id) }}" style="display:inline">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Borrar?');">Borrar</button>

                    </form>
                    @if (Auth::user()->tieneRole('Super Administrador'))
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>

@endsection
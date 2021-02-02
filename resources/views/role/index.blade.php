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
                            <a class="btn btn-success" href="{{ route('role.create') }}">Agregar Role</a>
                           
                        </td>
                    </tr>
                </table>
                <br>
                @endif
                
                <h1>Lista de Roles</h1>
                <table class="table table-light table-hover">

                    <thead class="thead-light" >
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
        <tr>
            <td>{{$role->id}}</td>
            <td>{{$role->name}}</td>
            <td>{{$role->description}}</td>
           
            <td>
            @if (Auth::user()->tieneRole('Super Administrador'))
            <form method="POST" action="{{ route('role.destroy',['role'=>$role->id]) }}">
            @csrf
            {{ method_field('DELETE') }}
            <input  type="submit" class="btn btn-danger" value="Eliminar" />
            </form>
            <form action="{{ route('role.edit',['role'=>$role->id]) }}">
            <input  type="submit" class="btn btn-warning" value="Editar" />
            </form>
            
            </td>
            @endif
        </tr>
        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection
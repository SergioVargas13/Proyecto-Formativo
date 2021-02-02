@extends('adminlte::page')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <br>
                


                @if (Auth::user()->tieneRole('Super Administrador'))
                <form method="POST" action="{{ route('role.update',['role'=>$role->id]) }}">
                    @csrf
                    {{ method_field('PUT') }}
                    
                    <div class="form-group">
                    <h2>Sección para Editar Roles</h2>
                    </div>
                    
                    <div class="form-group">
                    <label for="name" class="control-label" >{{'Name'}}</label>       
                    <input type="text" class="form-control" name="name" value="{{  $role->name }}" />
                    </div>
                    <div class="form-group">
                    <label for="description" class="control-label" >{{'Descripcion'}}</label>       
                    <input type="text" class="form-control" name="description" value="{{ $role->description  }}" />
                    </div>
                    
                    
                    <br>       
                    <input type="submit" class="btn btn-success" name="btnEnviar" value="Modificar" />
                    <a class="btn btn-primary" href="{{ route('role.index') }}">Volver</a><br><br>
                            </td>
                        </tr>
                </form>
                @else
                <h1>Acción no permitida</h1>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection
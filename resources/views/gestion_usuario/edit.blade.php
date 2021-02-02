@extends('adminlte::page')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <br>
                


                @if (Auth::user()->tieneRole('Super Administrador'))
                <form method="POSt" action="{{ route('gestion_usuario.update',['gestion_usuario'=>$gestion_usuario->id]) }}">
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="form-group">
                    <h2>Sección para Editar Usuario</h2>
                    </div>

                    <div class="form-group">
                    <label for="documento" class="control-label" >{{'Id'}}</label>
                    <input readonly type="number" class="form-control" name="id" value="{{ $gestion_usuario->id }}" />
                    </div>        
                    
                    <div class="form-group">
                    <label for="nombre" class="control-label" >{{'Documento'}}</label>
                    <input type="text" class="form-control" name="documento" value="{{ $gestion_usuario->documento }}" />
                    </div>        
                    
                    <div class="form-group">
                    <label for="salario" class="control-label" >{{'Nombre'}}</label>
                    <input type="text" class="form-control" name="nombre" value="{{ $gestion_usuario->nombre }}" />
                    </div>        
                    
                    <div class="form-group">
                    <label for="salario" class="control-label" >{{'Salario'}}</label>
                    <input type="number" class="form-control" name="salario" value="{{ $gestion_usuario->salario }}" />
                    </div>        
                    
                    <div class="form-group">
                    <label for="telefono" class="control-label" >{{'Teléfono'}}</label>       
                    <input type="number" class="form-control" name="telefono" value="{{ $gestion_usuario->telefono }}" />
                    </div>
                    <br>       
                    <input type="submit" class="btn btn-success" name="btnEnviar" value="Modificar" />
                    <a class="btn btn-primary" href="{{ route('gestion_usuario.index') }}">Volver</a><br><br>
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
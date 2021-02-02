@extends('adminlte::page')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
<a href="{{ route('producto_terminado.index') }}">Volver</a><br><br>


@if (Auth::user()->tieneRole('Super Administrador'))
<form method="POSt" action="{{ route('producto_terminado.update',['producto_terminado'=>$producto_terminado->id]) }}">
{{ method_field('PUT') }}
@csrf

<div class="form-group">
    <h2>Sección para Editar producto terminado</h2>
    </div>

    <div class="form-group">
    <label for="id" class="control-label" >{{'Id'}}</label>  
    <input readonly type="number" class="form-control" name="id" value="{{ $producto_terminado->id }}" />
    </div>       
           

    <div class="form-group">
    <label for="Nombre" class="control-label">{{'Nombre'}}</label> 
    <input type="text" class="form-control" name="Nombre" value="{{ $producto_terminado->Nombre }}"  />
    </div>      
       
    <div class="form-group">
    <label for="Precio" class="control-label">{{'Precio'}}</label> 
    <input type="number" class="form-control" name="Precio"  value="{{ $producto_terminado->Precio }}"  />
    </div> 

    <div class="form-group">
    <label for="Descripcion" class="control-label">{{'Descripcion'}}</label>     
    <input type="text" class="form-control" name="Descripcion"  value="{{ $producto_terminado->Descripcion }}"  />
    </div>        
    
    <input type="submit" class="btn btn-success" name="btnEnviar" value="Modificar" />
    <a class="btn btn-primary" href="{{ route('producto_terminado.index') }}">Volver</a><br><br>
            
</form>
@else
    <h1>Acción no permitida</h1>
@endif

</div>
</div>
</div>
</div>

@endsection
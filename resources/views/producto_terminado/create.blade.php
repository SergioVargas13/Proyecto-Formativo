@extends('adminlte::page')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


@if (Auth::user()->tieneRole('Super Administrador'))
<form method="POSt" action="{{ route('producto_terminado.store') }}">
@csrf

<div class="form-group">
    <h2>Sección para Crear Producto terminado</h2>
    </div>

     <div class="form-group">
     <label for="id" class="control-label" >{{'Id'}}</label>   
     <input type="text" class="form-control" name="id" />
     </div>

     <div class="form-group">
     <label for="Nombre" class="control-label">{{'Nombre'}}</label>     
     <input type="text"  class="form-control" name="Nombre" />
    </div>
    
     <div class="form-group">
     <label for="Precio" class="control-label">{{'Precio'}}</label>          
     <input type="number" class="form-control" name="Precio" />
     </div>

     <div class="form-group">
     <label for="Descripcion" class="control-label">{{'Descripcion'}}</label>          
     <input type="text" class="form-control"  name="Descripcion" />
     <br>
    <input type="submit" class="btn btn-success" name="btnEnviar" value="Guardar" />
    <a class="btn btn-primary" href="{{ route('producto_terminado.index') }}">Volver</a>
</form>
@else
    <h1>Acción no permitida</h1>
@endif

</div>
</div>
</div>
</div>

@endsection
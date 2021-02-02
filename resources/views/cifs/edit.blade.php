@extends('adminlte::page')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
<a href="{{ route('cifs.index') }}">Volver</a><br><br>


@if (Auth::user()->tieneRole('Super Administrador'))
<form method="POSt" action="{{ route('cifs.update',['cif'=>$cifs->id]) }}">
{{ method_field('PUT') }}
@csrf

<div class="form-group">
    <h2>Sección para Editar Cifs</h2>
    </div>

    <div class="form-group">
    <label for="id" class="control-label" >{{'Id'}}</label>  
    <input readonly type="number" class="form-control" name="id" value="{{ $cifs->id }}" />
    </div>       
           

    <div class="form-group">
    <label for="Nombre" class="control-label">{{'Nombre'}}</label> 
    <input type="text" class="form-control" name="Nombre" value="{{ $cifs->Nombre }}"  />
    </div>      
       
    <div class="form-group">
    <label for="Precio" class="control-label">{{'Valor Diario'}}</label> 
    <input type="number" class="form-control" name="Precio"  value="{{ $cifs->Precio }}"  />
    </div> 

    <div class="form-group">
    <label for="Descripcion" class="control-label">{{'Descripcion'}}</label>     
    <input type="text" class="form-control" name="Descripcion"  value="{{ $cifs->Descripcion }}"  />
    </div>        
    
    <input type="submit" class="btn btn-success" name="btnEnviar" value="Modificar" />
    <a class="btn btn-primary" href="{{ route('cifs.index') }}">Volver</a><br><br>
            
</form>
@else
    <h1>Acción no permitida</h1>
@endif

</div>
</div>
</div>
</div>

@endsection
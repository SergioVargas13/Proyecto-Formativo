@extends('adminlte::page')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                


            @if (Auth::user()->tieneRole('Super Administrador'))
                <form method="POSt" action="{{ route('materia_prima.update',['materia_prima'=>$materia_prima->id]) }}">
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="form-group">
                    <h2>Sección para Editar Materia prima</h2>
                    </div>

                    <div class="form-group">
                    <label for="id" class="control-label" >{{'Codigo'}}</label>  
                    <input readonly type="number" class="form-control" name="id" value="{{ $materia_prima->id }}" />
                    </div>       
                           
                    <div class="form-group">
                    <label for="nombre" class="control-label">{{'Nombre'}}</label> 
                    <input type="text" class="form-control" name="nombre" value="{{ $materia_prima->nombre }}" />
                    </div>      
                       
                    <div class="form-group">
                    <label for="cantidad" class="control-label">{{'Cantidad'}}</label> 
                    <input type="number" class="form-control" name="cantidad" value="{{ $materia_prima->cantidad }}" />
                    </div> 
                
                    <div class="form-group">
                    <label for="costo" class="control-label">{{'Costo'}}</label>     
                    <input type="number" class="form-control" name="costo" value="{{ $materia_prima->costo }}" />
                    </div>        
                    
                    <div class="form-group">
                    <label for="unidadmedida" class="control-label">{{'Unidad de Medida'}}</label>
                    <input type="text" class="form-control" name="unidadmedida" value="{{ $materia_prima->unidadmedida }}" />
                    </div> 
                    <br>       
          
                    <input type="submit" class="btn btn-success" name="btnEnviar" value="Modificar" />
                    <a class="btn btn-primary" href="{{ route('materia_prima.index') }}">Volver</a><br><br>
                            
                </form>
               @else
               <h1>Acción No Permitida</h1>
               @endif

            </div>
        </div>
    </div>
</div>

@endsection
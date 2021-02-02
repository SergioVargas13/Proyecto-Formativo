@extends('adminlte::page')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                


            @if (Auth::user()->tieneRole('Super Administrador'))
                <form method="POSt" action="{{ route('mano_de_obra.update',['mano_de_obra'=>$mano_de_obra->id]) }}">
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="form-group">
                    <h2>Sección para Editar Mano de obra</h2>
                    </div>

                    <div class="form-group">
                    <label for="id" class="control-label" >{{'Id'}}</label>  
                    <input readonly type="number" class="form-control" name="id" value="{{ $mano_de_obra->id }}" />
                    </div>       
                           
                    <div class="form-group">
                    <label for="tipo_labor" class="control-label">{{'Tipo de labor'}}</label> 
                    <input type="text" class="form-control" name="tipo_labor" value="{{ $mano_de_obra->tipo_labor }}" />
                    </div>      
                       
                    <div class="form-group">
                    <label for="tiempo" class="control-label">{{'Tiempo'}}</label> 
                    <input type="text" class="form-control" name="tiempo" value="{{ $mano_de_obra->tiempo }}" />
                    </div> 
                
                    <div class="form-group">
                    <label for="costo" class="control-label">{{'Costo'}}</label>     
                    <input type="text" class="form-control" name="costo" value="{{ $mano_de_obra->costo }}" />
                    </div>        
                    
                        
          
                    <input type="submit" class="btn btn-success" name="btnEnviar" value="Modificar" />
                    <a class="btn btn-primary" href="{{ route('mano_de_obra.index') }}">Volver</a><br><br>
                            
                </form>
                @else
                <h1>Acción no permitida</h1>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection
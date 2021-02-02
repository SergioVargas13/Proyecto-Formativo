@extends('adminlte::page')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                


                @if (Auth::user()->tieneRole('Super Administrador'))
                <form method="POSt" action="{{ route('ficha_tecnica.update',['ficha_tecnica'=>$ficha_tecnica->id]) }}">
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="form-group">
                    <h2>Sección para Editar Ficha Tecnica</h2>
                    </div>

                    <div class="form-group">
                    <label for="id" class="control-label" >{{'Codigo'}}</label>  
                    <input readonly type="number" class="form-control" name="id" value="{{ $ficha_tecnica->id }}" />
                    </div>       
                           
                    <div class="form-group">
                    <label for="Num_Unidades" class="control-label">{{'Numero de Unidades'}}</label> 
                    <input type="number" class="form-control" name="Num_Unidades" value="{{ $ficha_tecnica->Num_Unidades }}" />
                    </div>      
                       
                    <div class="form-group">
                    <label for="tiempo" class="control-label">{{'Tiempo'}}</label> 
                    <input type="text" class="form-control" name="tiempo" value="{{ $ficha_tecnica->tiempo }}" />
                    </div> 
                
                    <div class="form-group">
                    <label for="descripcion" class="control-label">{{'Descripción'}}</label>     
                    <input type="text" class="form-control" name="descripcion" value="{{ $ficha_tecnica->descripcion }}" />
                    </div>        
                    <br>       
          
                    <input type="submit" class="btn btn-success" name="btnEnviar" value="Modificar" />
                    <a class="btn btn-primary" href="{{ route('ficha_tecnica.index') }}">Volver</a><br><br>
                            
                </form>
                @endif
                @if (Auth::user()->tieneRole('Panadero'))
                <form method="POSt" action="{{ route('ficha_tecnica.update',['ficha_tecnica'=>$ficha_tecnica->id]) }}">
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="form-group">
                    <h2>Sección para Editar Ficha Tecnica</h2>
                    </div>

                    <div class="form-group">
                    <label for="id" class="control-label" >{{'Codigo'}}</label>  
                    <input readonly type="number" class="form-control" name="id" value="{{ $ficha_tecnica->id }}" />
                    </div>       
                           
                    <div class="form-group">
                    <label for="Num_Unidades" class="control-label">{{'Numero de Unidades'}}</label> 
                    <input type="number" class="form-control" name="Num_Unidades" value="{{ $ficha_tecnica->Num_Unidades }}" />
                    </div>      
                       
                    <div class="form-group">
                    <label for="tiempo" class="control-label">{{'Tiempo'}}</label> 
                    <input type="text" class="form-control" name="tiempo" value="{{ $ficha_tecnica->tiempo }}" />
                    </div> 
                
                    <div class="form-group">
                    <label for="descripcion" class="control-label">{{'Descripción'}}</label>     
                    <input type="text" class="form-control" name="descripcion" value="{{ $ficha_tecnica->descripcion }}" />
                    </div>        
                    <br>       
          
                    <input type="submit" class="btn btn-success" name="btnEnviar" value="Modificar" />
                    <a class="btn btn-primary" href="{{ route('ficha_tecnica.index') }}">Volver</a><br><br>
                            
                </form>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection
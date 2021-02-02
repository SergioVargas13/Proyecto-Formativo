@extends('adminlte::page')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="container">
                    <br>
               
                @if (Auth::user()->tieneRole('Super Administrador'))
                <form method="POSt" action="{{ route('ficha_tecnica.store') }}">
                    @csrf
                    <div class="form-group">
                    <h2>Sección para Crear Ficha Tecnica</h2>
                    </div>

                     <div class="form-group">
                     <label for="id" class="control-label" >{{'Codigo'}}</label>   
                     <input type="number" class="form-control" name="id" />
                     </div>

                     <div class="form-group">
                     <label for="nombre" class="control-label">{{'Capacidad de Producción'}}</label>     
                     <input type="text"  class="form-control" name="Num_Unidades" />
                    </div>
                    
                     <div class="form-group">
                     <label for="cantidad" class="control-label">{{'Tiempo Promedio de Fabricación'}}</label>          
                     <input type="text" class="form-control" name="tiempo" />
                     </div>

                     <div class="form-group">
                     <label for="costo" class="control-label">{{'Descripción'}}</label>          
                     <input type="text" class="form-control"  name="descripcion" />
                     
                     <br>
                     
                    <input type="submit" class="btn btn-success" name="btnEnviar" value="Guardar" />
                    <a class="btn btn-primary" href="{{ route('ficha_tecnica.index') }}">Volver</a><br><br>
                </form>
                @endif

                @if (Auth::user()->tieneRole('Panadero'))
                <form method="POSt" action="{{ route('ficha_tecnica.store') }}">
                    @csrf
                    <div class="form-group">
                    <h2>Sección para Crear Ficha Tecnica</h2>
                    </div>

                     <div class="form-group">
                     <label for="id" class="control-label" >{{'Codigo'}}</label>   
                     <input type="number" class="form-control" name="id" />
                     </div>

                     <div class="form-group">
                     <label for="nombre" class="control-label">{{'Capacidad de Producción'}}</label>     
                     <input type="text"  class="form-control" name="Num_Unidades" />
                    </div>
                    
                     <div class="form-group">
                     <label for="cantidad" class="control-label">{{'Tiempo Promedio de Fabricación'}}</label>          
                     <input type="time" class="form-control" name="tiempo" />
                     </div>

                     <div class="form-group">
                     <label for="costo" class="control-label">{{'Descripción'}}</label>          
                     <input type="text" class="form-control"  name="descripcion" />
                     
                     <br>
                     
                    <input type="submit" class="btn btn-success" name="btnEnviar" value="Guardar" />
                    <a class="btn btn-primary" href="{{ route('ficha_tecnica.index') }}">Volver</a><br><br>
                </form>
                @endif

            </div>
        </div>
    </div>
</div>


@endsection
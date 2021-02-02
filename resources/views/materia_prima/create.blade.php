@extends('adminlte::page')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="container">
                    <br>
               
                    @if (Auth::user()->tieneRole('Super Administrador'))
                <form method="POSt" action="{{ route('materia_prima.store') }}">
                    @csrf
                    <div class="form-group">
                    <h2>Sección para Crear materia prima</h2>
                    </div>

                     <div class="form-group">
                     <label for="id" class="control-label" >{{'Codigo'}}</label>   
                     <input type="text" class="form-control" name="id" />
                     </div>

                     <div class="form-group">
                     <label for="nombre" class="control-label">{{'Nombre'}}</label>     
                     <input type="text"  class="form-control" name="nombre" />
                    </div>
                    
                     <div class="form-group">
                     <label for="cantidad" class="control-label">{{'Cantidad'}}</label>          
                     <input type="number" class="form-control" name="cantidad" />
                     </div>

                     <div class="form-group">
                     <label for="costo" class="control-label">{{'Costo'}}</label>          
                     <input type="number" class="form-control"  name="costo" />
                     
                     <div class="form-group">
                     <label for="unidadmedida" class="control-label">{{'Unidad de Medida'}}</label>              
                     <input type="text" class="form-control" name="unidadmedida" />
                     <br>
                     

                    <input type="submit" class="btn btn-success" name="btnEnviar" value="Guardar" />
                    <a class="btn btn-primary" href="{{ route('materia_prima.index') }}">Volver</a><br><br>
                </form>
                @else
                <h1>Acción no permitida</h1>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection
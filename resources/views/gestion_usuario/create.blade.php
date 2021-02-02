@extends('adminlte::page')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="container">
                    <br>


                    @if (Auth::user()->tieneRole('Super Administrador'))
                    <form method="POSt" action="{{ route('gestion_usuario.store') }}">
                        @csrf
                        <div class="form-group">
                            <h2>Sección para Crear Usuario</h2>
                        </div>

                        <div class="form-group">
                        <label for="documento" class="control-label" >{{'Documento'}}</label>
                        <input type="text" class="form-control" name="documento" />
                        </div>      
                        
                        <div class="form-group">
                        <label for="nombre" class="control-label" >{{'Nombre'}}</label>
                        <input type="text" class="form-control" name="nombre" />
                        </div>

                        <div class="form-group">
                        <label for="salario" class="control-label" >{{'Salario'}}</label>
                        <input type="number" class="form-control" name="salario" />
                        </div>
                        
                        <div class="form-group">
                        <label for="telefono" class="control-label" >{{'Teléfono'}}</label>
                        <input type="number" class="form-control" name="telefono" />
                        </div>
                        <br>
                        <input type="submit" class="btn btn-success" name="btnEnviar" value="Guardar" />
                    <a class="btn btn-primary" href="{{ route('gestion_usuario.index') }}">Volver</a><br><br>
                    </form>
                    @else
                    <h1>Acción no permitida</h1>
                    @endif

                </div>
            </div>
        </div>
    </div>

    @endsection
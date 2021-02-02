@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="container">
                    <br>


                    @if (Auth::user()->tieneRole('Super Administrador'))
                    <form method="POSt" action="{{ route('role.store') }}">
                        @csrf
                        <div class="form-group">
                            <h2>Sección para Crear Roles</h2>
                        </div>

                        <div class="form-group">
                        <label for="name" class="control-label" >{{'Name'}}</label>
                        <input type="text" class="form-control" name="name" />
                        </div>  
                          
                        
                        <div class="form-group">
                        <label for="description" class="control-label" >{{'Descripcion'}}</label>
                        <input type="text" class="form-control" name="description" />
                        </div>

                        <br>
                        <input type="submit" class="btn btn-success" name="btnEnviar" value="Guardar" />
                        <a class="btn btn-primary" href="{{ route('role.index') }}">Volver</a><br><br>
                    </form>
                    @else
                    <h1>Acción no permitida</h1>
                    @endif

                </div>
            </div>
        </div>
    </div>

    @endsection
@extends('adminlte::page')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <a href="{{ route('materia_prima.index') }}">Volver a Home</a><br><br>

                <table>
                    <tr>
                        <td>Codigo</td>
                        <td>
                            {{ $materia_prima->id }}
                        </td>
                    </tr>
                    <tr>
                        <td>Nombre</td>
                        <td>
                            {{ $materia_prima->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <td>Cantidad</td>
                        <td>
                            {{ $materia_prima->cantidad }}
                        </td>
                    </tr>
                    <tr>
                        <td>Costo</td>
                        <td>
                            {{ $materia_prima->costo }}
                        </td>
                    </tr>
                    <tr>
                        <td>Unidad de Medida</td>
                        <td>
                            {{ $materia_prima->unidadmedida }}
                        </td>
                    </tr>
                </table>
               

@endsection
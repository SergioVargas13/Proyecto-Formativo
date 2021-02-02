@extends('adminlte::page')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <a href="{{ route('gestion_usuario.index') }}">Volver</a><br><br>

                <table>
                    <tr>
                        <td>Codigo</td>
                        <td>
                            {{ $gestion_usuario->id }}
                        </td>
                    </tr>
                    <tr>
                        <td>Documento</td>
                        <td>
                            {{ $gestion_usuario->documento }}
                        </td>
                    </tr>
                    <tr>
                        <td>Nombre</td>
                        <td>
                            {{ $gestion_usuario->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <td>Salario</td>
                        <td>
                            {{ $gestion_usuario->salario }}
                        </td>
                    </tr>
                    <tr>
                        <td>Telefono</td>
                        <td>
                            {{ $gestion_usuario->telefono }}
                        </td>
                    </tr>
                </table>
               

@endsection
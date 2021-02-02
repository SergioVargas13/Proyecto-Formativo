@extends('adminlte::page')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <a href="{{ route('mano_de_obra.index') }}">Volver a Home</a><br><br>

                <table>
                    <tr>
                        <td>Id</td>
                        <td>
                            {{ $mano_de_obra->id }}
                        </td>
                    </tr>
                    <tr>
                        <td>Tipo de labor</td>
                        <td>
                            {{ $mano_de_obra->tipo_labor }}
                        </td>
                    </tr>
                    <tr>
                        <td>Tiempo</td>
                        <td>
                            {{ $mano_de_obra->tiempo }}
                        </td>
                    </tr>
                    <tr>
                        <td>Costo</td>
                        <td>
                            {{ $mano_de_obra->costo }}
                        </td>
                    </tr>
                    
                </table>
               

@endsection
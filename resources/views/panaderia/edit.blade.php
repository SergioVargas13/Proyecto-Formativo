@extends('adminlte::page')

@section('content')

<div class="container">

@if (Auth::user()->tieneRole('Super Administrador'))
                    
<form action="{{ url('/panaderia/'. $panaderia->id) }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('PATCH') }}

@include('panaderia.form',['Modo'=>'Editar'])



</form>
@else
<h1>Acción no permitida</h1>
@endif
</div>

@endsection
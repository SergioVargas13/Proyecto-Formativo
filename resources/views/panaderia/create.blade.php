@extends('adminlte::page')

@section('content')

<div class="container">

@if (Auth::user()->tieneRole('Super Administrador'))
<form action="{{ url('/panaderia')}}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
@include('panaderia.form',['Modo'=>'crear'])



</form>
@else
<h1>Acción no permitida</h1>
@endif
</div>

@endsection
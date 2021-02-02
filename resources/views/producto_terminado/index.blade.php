@extends('adminlte::page')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

            <table>
               <tr>
               <td>
    
              @if (Auth::user()->tieneRole('Super Administrador'))
              <a class="btn btn-success" href="{{ route('producto_terminado.create') }}">Agregar  Producto Terminado</a>
              <a class="btn btn-dark" href="{{ route('home') }}">Volver al Home</a><br>

              @endif
              </td>
              </tr>
          </table>
          <br>

        <table class="table table-light table-hover">

        <thead class="thead-light" >

        <tr>
            <td>Id</td>
            <td>Nombre</td>
            <td>Precio</td>
            <td>Descripcion</td>
            <td>Opciones</td>
        </tr>
       </thead>
        <tbody>
        @foreach($producto_terminado as $pt)
        <tr>
           <td>{{ $pt->id }}</td>
           <td>{{ $pt->Nombre }}</td>
           <td>{{ $pt->Precio }}</td>
           <td>{{ $pt->Descripcion }}</td>
        <td>
                
            @if (Auth::user()->tieneRole('Admin'))
            <form method="get" action="{{ route('producto_terminado.edit',['producto_terminado'=>$pt->id]) }}">
            <input class="btn btn-warning" type="submit" value="Editar">
            </form>
            <form method="post" action="{{ route('producto_terminado.destroy',['producto_terminado'=>$pt->id]) }}">
            @csrf
            {{ method_field('delete') }}
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Desea eliminar este producto terminado?');" value="Eliminar">
            </form>
            @endif
               
            </td>
            </tr>
        @endforeach
      </tbody>
       </table>

       </div>
       </div>
       </div>
        </div>

  @endsection

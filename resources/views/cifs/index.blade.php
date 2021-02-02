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
              <a class="btn btn-success" href="{{ route('cifs.create') }}">Agregar concepto</a>
              <a class="btn btn-dark" href="{{ route('home') }}">Volver al Home</a><br>

              @endif
              </td>
              </tr>
          </table>
          <br>

        <table class="table table-light table-hover">

        <thead class="thead-light" >

        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Valor Diario</th>
            <th>Descripcion</th>
            <th>Opciones</th>
        </tr>
       </thead>
        <tbody>
        @foreach($cifs as $cs)
        <tr>
           <td>{{ $cs->id }}</td>
           <td>{{ $cs->Nombre }}</td>
           <td>{{ $cs->Precio }}</td>
           <td>{{ $cs->Descripcion }}</td>
        <td>
                
            @if (Auth::user()->tieneRole('Super Administrador'))
            <form method="get" action="{{ route('cifs.edit',['cif'=>$cs->id]) }}">
            <input class="btn btn-warning" type="submit" value="Editar">
            </form>
            <form method="post" action="{{ route('cifs.destroy',['cif'=>$cs->id]) }}">
            @csrf
            {{ method_field('delete') }}
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Desea eliminar este concepto?');" value="Eliminar">
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

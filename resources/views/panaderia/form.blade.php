
{{ $Modo=='crear' ? '   Agregar Informacion':'Modificar Informacion'}}
<br/>
<br/>

<label for="NIT">{{'NIT'}}</label>
<input type="int" name="NIT" id="NIT" 

value="{{ isset($panaderia->NIT)?$panaderia->NIT:''}}">
<br/>
    
<label for="Nombre">{{'Nombre'}}</label>
<input type="text" name="Nombre" id="Nombre"

value="{{ isset($panaderia->Nombre)?$panaderia->Nombre:''}}">
<br/>
    
<label for="Telefono">{{'Telefono'}}</label>
<input type="text" name="Telefono" id="Telefono" 

value="{{ isset($panaderia->Telefono)?$panaderia->Telefono:''}}">
<br/>
    
<label for="Direcccion">{{'Direccion'}}</label>
<input type="text" name="Direccion" id="Direccion" 

value="{{ isset($panaderia->Direccion)?$panaderia->Direccion:''}}">
<br/>
    
     
<input type="submit" value="{{ $Modo=='crear' ? 'Agregar':'Modificar'}}" class="btn btn-success">
    
<a class="btn btn-primary" href="{{ url('panaderia')}}">Regresar</a>

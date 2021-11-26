<div>
    <div>
        <label>Razón Social</label>
        <label>{{$cliente->razonSocial}}</label>
    </div>
    <div>
        <label>CUIT</label>
        <label>{{$cliente->cuit}}</label>
    </div>
</div>
<a href="{{route("clientes.index")}}">Volver a Clientes</a>

<form action="{{route('clientes.destroy',$cliente->id)}}" method="POST">
    @csrf
    @method('DELETE')
<button type="submit">Eliminar</button>
</form>
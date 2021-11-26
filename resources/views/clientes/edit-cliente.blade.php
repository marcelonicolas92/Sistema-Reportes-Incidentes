<h1>Editar Cliente</h1>
<div>
    <form method="post" action="{{ route('clientes.update',$cliente->id) }}">
      @csrf
      @method('PUT')
        <div>
            <label>Razón Social</label>
            <input name="razon_social"  value="{{$cliente->razonSocial}}">
        </div>
        <div>
            <label>CUIT</label>
            <input name="cuit" value="{{$cliente->cuit}}">
        </div>
        <button type="submit">Actualizar</button>
    </form>
</div>
<a href="{{route('clientes.index')}}">Volver a Clientes</a>
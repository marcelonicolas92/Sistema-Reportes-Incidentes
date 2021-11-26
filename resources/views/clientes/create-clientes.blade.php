<h1>Dar de alta un cliente</h1>

@if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div>
    <form method="post" action="{{ route('clientes.store') }}">
       @csrf
        <div>
            <label>Razón Social</label>
            <input name="razon_social">
        </div>
        <div>
            <label>CUIT</label>
            <input name="cuit">
        </div>
        <button type="submit">Guardar</button>
    </form>
</div>
<a href="{{route('clientes.index')}}">Volver a Clientes</a>
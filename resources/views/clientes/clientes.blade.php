{{-- @include('header') --}}

 <div>
    <h1 >{{$titulo}}</h1>
</div>

<div>
    <label>Ingrese su filtro de búsqueda (por CUIT o razón social)</label>
    <form method="get" action='{{ route("clientes.index") }}'>
        <input name="razon_social">
        <input name="cuit">
        <button type="submit">Enviar</button>
    </form>
</div>

<div>
    <table>
        <thead>
            <tr>
                <th>Razón Social</th>
                <th>CUIT</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $unCliente)
                <tr>
                    <td><a href='{{ route('clientes.show', $unCliente->id)}}'>{{$unCliente->razonSocial}}</a> </td>
                    <td>{{$unCliente->cuit}}</td>
                    <td><a href="{{route('clientes.edit',$unCliente->id)}}">Editar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<a href="{{route('clientes.create')}}"><h2>Crear Nuevo Cliente</h2></a>
 


{{-- <a href='{{ route("clientes.show-clientes", $unCliente->id)}}'></a> --}}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\CommonMark\Parser\Block\IndentedCodeStartParser;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $razonSocialBuscada = $request->get('razon_social');
        $cuitBuscado = $request->get('cuit');

        // $clientes = DB::select('SELECT * FROM cliente')

        $clientes = DB::table('cliente')
            ->where('razonSocial','like',"%{$razonSocialBuscada}%")
            ->where('cuit','like',"{$cuitBuscado}%")
            ->get();

        $parametros = [
            'clientes' => $clientes,
            'titulo' => "Listado de Clientes"
        ];
        return view('clientes.clientes', $parametros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create-clientes');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'razon_social' => 'required',
            'cuit' => 'required|numeric'
        ]);

        $razonSocial = $request->post('razon_social');
        $cuit = $request->post('cuit');

        /*$parametros = $request->post();
        $parametros['razon_social'];*/

        DB::insert('insert into cliente (razonSocial, cuit) values (?,?)',[$razonSocial, $cuit]);
        return response()->redirectTo('clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!is_numeric($id)) {
            return response('', 404);
        }
        $cliente = DB::table('cliente')
            ->where('id', '=', $id)
            ->first();
        return view('clientes.show-clientes', ['cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente=DB::table('cliente')
        ->where('id','=',$id)
        ->first();
        
        return view('clientes.edit-cliente',['cliente'=>$cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $razonSocial = $request->get('razon_social');
        $cuit = $request->get('cuit');
        
       $cliente= DB::update("update cliente set razonSocial= '$razonSocial', cuit='$cuit' where id='$id'");

       return response()->redirectTo('clientes');

    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        DB::delete("delete from cliente where id = '$id'");
        return response()->redirectTo('clientes');

    }
}

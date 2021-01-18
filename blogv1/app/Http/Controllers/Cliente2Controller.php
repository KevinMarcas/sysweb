<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Cliente;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ClienteFormRequest;
use Illuminate\Support\Facades\DB;

class Cliente2Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {

    }
    public function create()
    {


    }
    public function store(ClienteFormRequest $request)
    {
        $Cliente = new Cliente;
        $Cliente -> Nombre =$request->get ('Nombre');
        $Cliente ->Apellido =$request -> get ('Apellido');
        $Cliente ->Celular =$request -> get ('Celular');
        $Cliente ->Correo =$request -> get ('Correo');
        $Cliente ->TipDocumento =$request -> get ('TipDocumento');
        $Cliente ->NumDocumento =$request -> get ('NumDocumento');
        $Cliente ->Direccion =$request -> get ('Direccion');
        $Cliente -> save();
        $num_hab = $request->get('n_hab');
        return Redirect::to('reserva/registro/'. $num_hab .'/create');
    }
    public function show($id)
    {

    }
    public function edit($id)
    {
        $Cliente =Cliente::findOrFail($id);
        return view("reserva.clientes.edit",["Cliente"=>$Cliente]);
    }
    public function update(ClienteFormRequest $request,$id)
    {

    }
    public function destroy(Request $request, $id){

    }
}

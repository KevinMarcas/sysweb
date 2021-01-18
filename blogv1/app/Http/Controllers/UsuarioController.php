<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UsuarioFormRequest;
use App\Http\Requests\Usuario2FormRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class UsuarioController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){

        if ($request){

            $query=trim($request->get('searchText'));
            $usuario=DB::table('usuario')->where('Nombre','LIKE','%'.$query.'%')
            ->orwhere('NumDocumento','LIKE','%'.$query.'%')
            ->orwhere('Estado','LIKE','%'.$query.'%')
            ->orderBy('IdUsuario','desc')
            ->paginate(7);
            return view('acceso.usuario.index',["usuario"=>$usuario, "searchText"=>$query]);
        }
    }

    public function create(){
        return view ("acceso.usuario.create");
    }

    public function store(UsuarioFormRequest $request){
        $usuario = new User;
        $usuario->Nombre=strtoupper($request->get('Nombre'));
        $usuario->Apellido=strtoupper($request->get('Apellido'));
        $usuario->NumDocumento=$request->get('NumDocumento');
        $usuario->password=bcrypt($request->get('password'));
        // $usuario->clave=$request->get('password');
        $usuario->Celular=$request->get('Celular');
        $usuario->email=$request->get('email');
        $usuario->Estado='ACTIVO';
        $usuario->save();
        return Redirect::to('acceso/usuario');
    }

    public function edit($id){
        return view("acceso.usuario.edit",["usuario"=>User::findOrFail($id)]);
    }

    public function update(Usuario2FormRequest $request, $id){
        $usuario=User::findOrFail($id);
        $usuario->Nombre=strtoupper($request->get('Nombre'));
        $usuario->Apellido=strtoupper($request->get('Apellido'));
        $usuario->NumDocumento=$request->get('NumDocumento');
        if($request->get('password') != ''){
            $usuario->password=bcrypt($request->get('password'));

        }
        $usuario->Celular=$request->get('Celular');
        $usuario->email=$request->get('email');
        $usuario->update();
        return Redirect::to('acceso/usuario');
    }

    public function show($id){
        $n_id = substr($id, 1);

        $vuser=DB::table('usuario')
        ->where('IdUsuario','=', $n_id)
        ->first();
        if (isset($vuser->Estado)){
            if($vuser->Estado=='ACTIVO'){
                $estado = "INACTIVO";
            }else{
                $estado = "ACTIVO";
            }
        }

        $usuario=User::findOrFail($n_id);
        $usuario->Estado=$estado;
        $usuario->update();
        return Redirect::to('acceso/usuario');
    }

    // public function show ($id){
    //     echo "sad";
    // }
}

<?php

namespace App\Http\Controllers\administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\role;
class usuariosController extends Controller
{
    public function index(){
        
        $usuarios=User::all();
        $roles=role::all();
        return view('administrador.usuarios',compact('usuarios','roles'));
    }

    public function crearUsuarios(Request $request){
        
        $data=$request->all();

        $user= new User;
        $user->name=$data['name'];
        $user->email=$data['email'];
        $user->password=bcrypt($data['password']);
        $user->save();
        $user->roles()->attach(Role::where('id',$data['id_role'])->first());
        return redirect('admin/usuarios');
    }
    public function eliminarUsuarios(Request $request){
        
        $user=User::find($request->id);
        $user->delete();
        return redirect('admin/usuarios');
    }  
}

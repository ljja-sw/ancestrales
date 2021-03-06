<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\User;
use App\Pedido;
use Storage;
Use Image;
use Auth;
use DB;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::whereIdUsuario(Auth::user()->id)
        ->limit(5)
        ->get();
        return view('perfil.detalles',compact("pedidos"));
    }

    public function pedidos()
    {
        $pedidos = Pedido::whereIdUsuario(Auth::user()->id)
        ->paginate();
        return view('perfil.pedidos.todos',compact('pedidos'));
    }

    public function actualizar_avatar(Request $request)
    {
        $usuario = Auth::user();
        $imagen = $request->file('input-imagen');
        $image_ajustada = Image::make($imagen)->fit(300)->encode('jpg');
        $nombre_archivo = "avatar_{$usuario->id}_".time().".jpg";
        $directorio = "usuario_{$usuario->id}_{$usuario->created_at->format('dmy')}/foto_perfil/{$nombre_archivo}";

        if (Storage::disk('subidas')->put( $directorio, $image_ajustada)) {
            $usuario->foto_perfil = $nombre_archivo;
            $usuario->save();

            $request->session()->flash('alert-success', 'Foto de perfil actualizada!');
            return redirect()->back();

        } else {
            $request->session()->flash('alert-danger', 'Hubo un error!');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        $user->nombres = $request['nombres'];
        $user->apellidos = $request['apellidos'];
        $user->email = $request['correo'];
        $user->direccion = $request['direccion'];
        $user->save();

        $request->session()->flash('alert-success', 'Has actualizado tu perfil!');
        return redirect()->back();
    }

    public function datatable()
    {
        $users = User::join('model_has_roles','model_has_roles.model_id','=','users.id')
        ->join('roles','roles.id','=','model_has_roles.role_id')
        ->select('nombres','apellidos','direccion','email','cedula','users.created_at','roles.name')
        ->role('comprador')
        ->get();

        return datatables()->of($users)
        ->editColumn('created_at',function($user){
            return $user->created_at->format('Y-m-d');
        })->toJson();
    }
}

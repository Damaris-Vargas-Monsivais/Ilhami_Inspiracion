<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\LoginModel;
use App\Models\CategoriesModel;

class LoginController extends Controller
{
    public function index()
    {
        if(session('usuario') && session('usuario')['login'])
        {
            return redirect('admin');
        }

        $data['categorias'] = CategoriesModel::where('estado' , 1)->get();
        $data['info'] = $this->info();

    	echo view('layouts.header' , $data);
    	echo view('login');
    }


    // Validar usuario e iniciar sesion
    public function sesion(Request $request)
    {
        $email = $request->input('email'); 
        $clave = $request->input('clave');

        $validar = LoginModel::where('email' , $email)->where('estado' , 1)->first();

        if(!$validar)
        {
            echo json_encode(['status' => false, 'msg' => 'Algo pasó, intente de nuevo']);
            return;
        }

        if(!password_verify($clave, $validar->clave))
        {
            echo json_encode(['status' => false, 'msg' => 'Los datos no coinciden, intente de nuevo']);
            return;
        }

        $usuario    =
        [
            'idusuario' => $validar->idusuario,
            'rolid'     => $validar->rolid,
            'nombres'   => $validar->nombres,
            'apellidos' => $validar->apellidos,
            'email'     => $validar->email,
            'telefono'  => $validar->telefono,
            'login'     => TRUE
        ];

        $request->session()->put('usuario' , $usuario);
        echo json_encode(['status' => true, 'rolid' => $validar->rolid]);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('usuario');
        $request->session()->forget('cart');
        return redirect('/');
    }
}

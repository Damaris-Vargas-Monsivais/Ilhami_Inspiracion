<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoginModel;

class UserController extends Controller
{
    public function editperfil($idusuario)
    {
    	if(!session('usuario')['login'])
    	{
    		return redirect('/');
    	}
        
        $data['title'] = 'Perfil';
    	$data['usuario']	= LoginModel::where('idusuario' , $idusuario)->first();

    	echo view('admin.header_admin' , $data);
    	echo view('admin.editperfil' , $data);
    	echo view('admin.footer_admin');
    
    }


    public function storeperfil(Request $request)
    {
        if(!$request->ajax()) 
        {
            echo json_encode(['status' => false, 'msg' => 'Algo pasó, intente de nuevo']);
            return;
        }

        $idusuario      = $request->input('idusuario');
        $nombres        = $request->input('nombres');
        $apellidos      = $request->input('apellidos');
        $email          = $request->input('email');
        $telefono       = $request->input('telefono');

        if(!filter_var($email , FILTER_VALIDATE_EMAIL))
        {
            echo json_encode(['status' => false, 'msg' => 'El email ingresado no es válido']);
            return;
        }

        $data_user      =
        [
            'nombres'   => $nombres,
            'apellidos' => $apellidos,
            'email'     => $email,
            'telefono'  => $telefono
        ];

        LoginModel::where('idusuario' , $idusuario)->update($data_user);
        echo json_encode(['status' => true, 'msg' => 'Datos actualizados']);
    }   
}

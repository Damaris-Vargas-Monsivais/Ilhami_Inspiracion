<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriesModel;
use App\Models\ProductModel;

class HomeController extends Controller
{
    public function index()
    {
    	if(session('usuario') && session('usuario')['login'] && session('usuario')['rolid'] == 1)
        {
            return redirect('admin');
        }
        
        $data['categorias']     = CategoriesModel::where('estado' , 1)
                                 ->orderBy('descripcion' , 'ASC')
                                 ->get();


        // Envío solo 3 registros para muestra en welcome
        $data['cate_welcome']       = CategoriesModel::where('estado' , 1)
                                    ->limit(3)
                                    ->inRandomOrder()
                                    ->get();


        $data['products']            = ProductModel::select('productos.*' , 'img.imagen as imagen', 'ca.descripcion as categoria')
                                              ->join('categorias as ca' , 'ca.idcategoria' , '=', 'productos.categoriaid')
                                              ->join('imagenes_producto as img' , 'img.productoid' , '=', 'productos.idproducto')
                                              ->offset(10)
                                              ->limit(8)
                                              ->where('productos.estado' , 1)
                                              ->inRandomOrder()
                                              ->get();
                                              
      $data['info']                =  $this->info();                    

    	echo view('layouts.header' , $data);
    	echo view('welcome' , $data);
    	echo view('layouts.footer' , $data);
    }
}

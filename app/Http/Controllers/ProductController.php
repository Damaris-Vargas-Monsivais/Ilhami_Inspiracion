<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CategoriesModel;
use App\Models\ProductModel;
use App\Models\ImageProductModel;
use App\Models\CharacteristicModel;
use App\Models\SpecificationModel;

use Barryvdh\DomPDF\Facade as PDF;

class ProductController extends Controller
{
    public function index()
    {
        $data['categorias']    = CategoriesModel::where('estado' , 1)->get();
        $data['products']      =   ProductModel::
                                            select('productos.*', 'ca.descripcion as categoria', 'img.imagen as imagen')
                                            ->join('categorias as ca' , 'ca.idcategoria' , '=' , 'productos.categoriaid')
                                            ->join('imagenes_producto as img' , 'img.productoid', '=' , 'productos.idproducto')
                                            ->distinct('img.productoid')
                                            ->where('productos.estado' , 1)
                                            ->simplePaginate(9);

        $data['categories']     = CategoriesModel::where('estado' , 1)
                                                ->orderBy('descripcion', 'ASC')
                                                ->get();

        $prod_cate              = [];
        foreach($data['categories'] as $categorie) {
            $prod_cate[] = count(ProductModel::where('categoriaid' , $categorie->idcategoria)->where('estado' , 1)->get());
        }   

        $data['product_categorie']   = $prod_cate;
        $data['info']                = $this->info();

    	echo view('layouts.header' , $data);
    	echo view('products' , $data);
    	echo view('layouts.footer' , $data);
    }


    public function products_categorie($idcategoria)
    {

        // Obtener los datos de los producto por categoría
        $data['products_categorie'] = ProductModel::
                                            select('productos.*', 'ca.descripcion as categoria', 'img.imagen as imagen')
                                            ->join('categorias as ca' , 'ca.idcategoria' , '=' , 'productos.categoriaid')
                                            ->join('imagenes_producto as img' , 'img.productoid', '=' , 'productos.idproducto')
                                            ->distinct('img.productoid')
                                            ->where('productos.estado' , 1)
                                            ->where('productos.categoriaid' , $idcategoria)
                                            ->simplePaginate(9);

        $data['categorias']         = CategoriesModel::where('estado' , 1)->get();

        $data['categories']         = CategoriesModel::where('estado' , 1)
                                                ->orderBy('descripcion', 'ASC')
                                                ->get();

        $data['categoria']          = CategoriesModel::where('idcategoria' , $idcategoria)->first();

        $prod_cate                  = [];
        foreach($data['categories'] as $categorie) {
            $prod_cate[] = count(ProductModel::where('categoriaid' , $categorie->idcategoria)->where('estado' , 1)->get());
        }   

        $data['product_categorie']  = $prod_cate;
        $data['info']               = $this->info();


        echo view('layouts.header' , $data);
        echo view('products_categorie' , $data);
        echo view('layouts.footer', $data);
    }


    public function detail($idproducto)
    {
        $data['categorias']         =   CategoriesModel::where('estado' , 1)->get();

        $data['product']            =   ProductModel::
                                            select('productos.*', 'ca.descripcion as categoria')
                                            ->join('categorias as ca' , 'ca.idcategoria' , '=' , 'productos.categoriaid')
                                            ->where('productos.estado' , 1)
                                            ->where('productos.idproducto' , $idproducto)
                                            ->first();

        $data['images_product']     =   ImageProductModel::where('productoid' , $idproducto)->get();
        $data['categorie']          =   ProductModel::where('idproducto', $idproducto)->first();

        $data['caracteristicas']    =   CharacteristicModel::where('productoid' , $idproducto)->get();
        $data['especificaciones']   =   SpecificationModel::where('productoid' , $idproducto)->get();
        $data['info']               =   $this->info();

    	echo view('layouts.header' , $data);
    	echo view('detail' , $data);
    	echo view('layouts.footer' , $data);
    }



    public function getcantstock(Request $request)
    {
        if(!$request->ajax())
        {
            echo json_encode(['status' => false, 'msg' => 'Algo pasó, intente de nuevo']);
            return;
        }

        $idproduct      = $request->input('idproducto');
        $product        = ProductModel::where('estado' , 1)
                                        ->where('idproducto' , $idproduct)
                                        ->first();

        echo json_encode(['status' => true, 'product' => $product]);
    }



    public function pruebis()
    {
        $data['cart']       = $this->create_cart();
        $data['contador']   = 1;
        
        if( empty($data['cart']['productos']) )
        {
            return 'El carrito está vacío';
        }


        $pdf                = PDF::loadView('pruebita' , $data); 

        /*
            Para guardar en una carpeta
            save( 'uploads/reportes/' . date('Y-m-d-H-i-s') . '.pdf' )

            Para mostrar en el navegador
            stream( date('Y-m-d-H-i-s') . '.pdf')

            Para descargar directamente
            download('nombrepdf')
        */
        return $pdf->save( 'uploads/reportes/' . date('Y-m-d-H-i-s') . '.pdf' )->stream( date('Y-m-d-H-i-s') . '.pdf');
    }

}
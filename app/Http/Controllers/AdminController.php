<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\LoginModel;
use App\Models\CategoriesModel;
use App\Models\SpecificationModel;
use App\Models\CharacteristicModel;
use App\Models\ProductModel;
use App\Models\ImageProductModel;
use App\Models\VentaModel;
use App\Models\SettingsModel;

class AdminController extends Controller
{
    public function index()
    {
    	if(session('usuario') && !session('usuario')['login'])
    	{
    		return redirect('/');
    	}
        
        $data['title']          = 'Inicio';
        $data['entregados']     = VentaModel::where('estado' , 0)->count();
        $data['pendientes']     = VentaModel::where('estado' , 1)->count();
        $data['orders']         = VentaModel::count();
        $data['orders_user']    = VentaModel::count();


    	echo view('admin.header_admin' , $data);
    	echo view('admin.home' , $data);
    	echo view('admin.footer_admin');
    }


    public function orders()
    {
        if(session('usuario') && !session('usuario')['login'])
        {
            return redirect('/');
        } 
        
        $data['title']          = 'Órdenes';
        $data['orders']         = VentaModel::count();
        $data['orders_user']    = VentaModel::count();

        echo view('admin.header_admin' , $data);
        echo view('admin.orders' , $data);
        echo view('admin.footer_admin');
    }


    /*
        Lista de productos
    */
    public function products()
    {
        if(session('usuario') && !session('usuario')['login'])
        {
            return redirect('/');
        }
        
        $data['title']          =   'Productos';
        $data['products']       =   ProductModel::select('productos.*', 'ca.descripcion as categoria')
                                              ->join('categorias as ca' , 'ca.idcategoria' , '=' , 'productos.categoriaid')
                                              ->where('productos.estado' , 1)
                                              ->get();
        $data['orders']         = VentaModel::count();
        $data['orders_user']    = VentaModel::count();

        echo view('admin.header_admin'  , $data);
        echo view('admin.products' , $data);
        echo view('admin.footer_admin');
    }

    /*
        Obtener productos
    */
    public function getProducts() 
    {
        $products   =   ProductModel::
                                select('productos.idproducto as idproducto', 'productos.nombre as nombre', 
                                    'productos.descripcion as descripcion', 'productos.precio as precio', 
                                    'productos.stock as stock', 'ca.descripcion as categoria')
                                ->join('categorias as ca' , 'ca.idcategoria' , '=' , 'productos.categoriaid')
                                ->where('productos.estado' , 1)
                                ->orderBy('idproducto', 'ASC')
                                ->get();

        return datatables()
                ->of($products)
                ->addColumn('btn' , 'admin.actions')
                ->rawColumns(['btn'])
                ->toJson();                      
    }

    /*
        Vista agregar nuevo producto
    */
    public function newproduct()
    {
        if(session('usuario') &&  !session('usuario')['login'])
        {
            return redirect('/');
        }

        $data['title']          = 'Nuevo producto';
        $data['categorias']     = CategoriesModel::where('estado' , 1)
                                                ->orderBy('descripcion', 'ASC')
                                                ->get();

        $data['orders']         = VentaModel::count();
        $data['orders_user']    = VentaModel::count();

        echo view('admin.header_admin' , $data);
        echo view('admin.newproduct' , $data);
        echo view('admin.footer_admin');
    }


    /*
        Agregar nuevo producto
    */
    public function add_newproducto(Request $request)
    {
        if(!$request->ajax()) 
        {
            echo json_encode(['status' => false, 'msg' => 'Algo pasó, intente de nuevo']);
            return;
        }

        $categoria          = $request->input('categoria');
        $nombre             = $request->input('nombre');
        $descripcion        = $request->input('descripcion');
        $precio             = $request->input('precio');
        $stock              = $request->input('stock');
        $sku                = $request->input('sku');
        $especificaciones   = $request->post('especificaciones');
        $caracteristicas    = $request->post('caracteristicas');
        $imagenes           = $request->file('imagenes');

        /*
            Algunas validaciones
        */
        if(strlen($nombre) < 8)
        {
            echo json_encode(['status' => false, 'msg' => 'El nombre debe tener al menos 8 caracteres']);
            return; 
        }

        if(!is_numeric($precio))
        {
            echo json_encode(['status' => false, 'msg' => 'El precio solo admite números']);
            return;
        }

        if(!is_numeric($stock))
        {
            echo json_encode(['status' => false, 'msg' => 'El stock solo admite números']);
            return;
        }

        if(!is_numeric($sku) || strlen($sku) > 8)
        {
            echo json_encode(['status' => false, 'msg' => 'El sku debe ser revisado']);
            return;
        }

        $data_producto      = 
        [
            'categoriaid'   => $categoria,
            'nombre'        => $nombre,
            'descripcion'   => $descripcion,
            'precio'        => $precio,
            'stock'         => $stock,
            'sku'           => $sku,
            'estado'        => 1
        ];


        /*
            Agregamos el producto con la intención de obtener el id insertado
        */

        ProductModel::insert($data_producto);
        $producto           = ProductModel::latest('idproducto')->first();

        /*
            Se agregan la especificaciones
        */
        foreach($especificaciones as $especificacion) {
            $especificacion = trim($especificacion);
            if(!empty($especificacion)) {
                $data_especificacion = 
                [
                    'productoid'    => $producto->idproducto,
                    'descripcion'   => $especificacion
                ];

                SpecificationModel::insert($data_especificacion);
            }
        }


        /*
            Se agregan las características
        */
            foreach($caracteristicas as $caracteristica) {
            $caracteristica = trim($caracteristica);
            if(!empty($caracteristica)) {
                $data_caracteristica = 
                [
                    'productoid'    => $producto->idproducto,
                    'descripcion'   => $caracteristica
                ];

                CharacteristicModel::insert($data_caracteristica);
            }
        }

        /*
            Guardado de imagenes  
        */
        
        foreach($imagenes as $imagen)
        {
            $nombre = $imagen->getClientOriginalName();
            $imagen->move(public_path('uploads/') , $nombre);

            $data_imagen = 
            [
                'productoid'    => $producto->idproducto,
                'imagen'        => $nombre
            ];

            ImageProductModel::insert($data_imagen);
        }
        
        echo json_encode(['status' => true]);
    }

    /*
        Vista de editar producto
    */
    public function editproduct($idproducto) 
    {

        $data['title']              =   'Editar producto';
        $data['categorias']         =   CategoriesModel::where('estado' , 1)
                                                ->orderBy('descripcion', 'ASC')
                                                ->get();

        $data['product']            =   ProductModel::
                                        select('productos.idproducto as idproducto', 'productos.nombre as nombre', 
                                                'productos.descripcion as descripcion', 'productos.precio as precio', 
                                                'productos.stock as stock', 'productos.sku as sku', 'productos.categoriaid as categoriaid', 'ca.descripcion as categoria', 'ca.idcategoria as idcategoria')
                                        ->join('categorias as ca' , 'ca.idcategoria' , '=' , 'productos.categoriaid')
                                        ->where('productos.estado' , 1)
                                        ->where('idproducto', $idproducto)
                                        ->first();


        $data['especificaciones']   =   SpecificationModel::where('productoid' , $idproducto)->get();
        $data['caracteristicas']    =   CharacteristicModel::where('productoid' , $idproducto)->get();
        $data['imagenes']           =   ImageProductModel::where('productoid' , $idproducto)->get();
        $data['orders']             = VentaModel::count();

        echo view('admin.header_admin' , $data);
        echo view('admin.editproduct' , $data);
        echo view('admin.footer_admin');
    }


    public function loadimagesid(Request $request)
    {
        if(!$request->ajax()) 
        {
            echo json_encode(['status' => false, 'msg' => 'Algo pasó, intente de nuevo']);
            return;
        }

        $idproducto         = $request->input('idproducto');
        $imagenes           =   ImageProductModel::where('productoid' , $idproducto)->get();

        echo json_encode(['status' => true, 'imagenes' => $imagenes]);
    }


    public function loadimagesidcat(Request $request)
    {
        if(!$request->ajax()) 
        {
            echo json_encode(['status' => false, 'msg' => 'Algo pasó, intente de nuevo']);
            return;
        }

        $idcategoria        = $request->input('idcategoria');
        $imagen             = CategoriesModel::where('idcategoria' , $idcategoria)->first();

        echo json_encode(['status' => true, 'imagen' => $imagen]);
    }


    public function store_product(Request $request)
    {
        if(!$request->ajax()) 
        {
            echo json_encode(['status' => false, 'msg' => 'Algo pasó, intente de nuevo']);
            return;
        }

        $idproducto             = $request->input('idproducto');
        $categoria              = $request->input('categoria');
        $nombre                 = $request->input('nombre');
        $descripcion            = $request->input('descripcion');
        $precio                 = number_format((int) $request->input('precio') , 0);
        $stock                  = $request->input('stock');
        $sku                    = $request->input('sku');
        $especificaciones       = explode(',', $request->post('especificaciones'));
        $caracteristicas        = explode(',', $request->post('caracteristicas'));
        $imagenes               = $request->file();


        /*
            Validamos algunos campos de la tabla productos
        */
        if(strlen($nombre) < 8)
        {
            echo json_encode(['status' => false, 'msg' => 'El nombre debe tener al menos 8 caracteres']);
            return; 
        }

        if(!is_numeric($precio))
        {
            echo json_encode(['status' => false, 'msg' => 'El precio solo admite números']);
            return;
        }

        if(!is_numeric($stock))
        {
            echo json_encode(['status' => false, 'msg' => 'El stock solo admite números']);
            return;
        }

        if(!is_numeric($sku))
        {
            echo json_encode(['status' => false, 'msg' => 'El sku solo admite números']);
            return;
        }   


        /*
            Actualizamos los datos del producto
        */
        $data_producto          = 
        [
            'categoriaid'       => $categoria,
            'nombre'            => $nombre,
            'descripcion'       => $descripcion,
            'precio'            => $precio,
            'stock'             => $stock,
            'sku'               => $sku
        ];      

        ProductModel::where('idproducto' , $idproducto)->update($data_producto);

        /*
            Actualizar las especificaciones
        */
        $especificaciones_db    = SpecificationModel::where('productoid' , $idproducto)->get();
        foreach($especificaciones_db as $index => $especificacion) 
        {
            $data_especificacion = 
            [
                'descripcion'    => $especificaciones[$index]
            ];

            SpecificationModel::where('productoid' , $idproducto)
                                ->where('idespecificacion' , $especificacion->idespecificacion)
                                ->update($data_especificacion);
        }
        
        /*
            Actualizar las caracteristicas
        */
        $caracteristicas_db    = CharacteristicModel::where('productoid' , $idproducto)->get();
        foreach($caracteristicas_db as $index => $caracteristica) 
        {
            $data_caracteristica = 
            [
                'descripcion'    => $caracteristicas[$index]
            ];

            CharacteristicModel::where('productoid' , $idproducto)
                                ->where('idcaracteristica' , $caracteristica->idcaracteristica)
                                ->update($data_caracteristica);
        }   


        /*
            Actualizar las imagenes
        */ 
        $imagenes_db            = ImageProductModel::where('productoid' , $idproducto)->get();

        foreach($imagenes as $index => $imagen)
        {
            if(!empty($imagen))
            {
                $data_imagen    =
                [
                    'imagen'        => $imagen->getClientOriginalName()
                ];

                ImageProductModel::where('productoid' , $idproducto)
                                  ->where('idimagen' , $imagenes_db[$index]->idimagen)
                                  ->update($data_imagen);

               unlink(public_path('uploads/' . $imagenes_db[$index]->imagen)); 
               $imagen->move(public_path('uploads/') , $imagen->getClientOriginalName());
            }
        }
        echo json_encode(['status' => true]);
    }


    public function deleteproduct(Request $request)
    {
        if(!$request->ajax()) 
        {
            echo json_encode(['status' => false, 'msg' => 'Algo pasó, intente de nuevo']);
            return;
        }

        $idproducto     = $request->input('idproducto');
        ProductModel::where('idproducto' , $idproducto)->update(['estado' => 0]);
        echo json_encode(['status' => true]);
    }

    /*
        Registro de usuarios
    */
    public function newrecord(Request $request)
    {
        if(!$request->ajax()) 
        {
            echo json_encode(['status' => false, 'msg' => 'Algo pasó, intente de nuevo']);
            return;
        }
        
        $nombres        = $request->input('nombres');
        $apellidos      = $request->input('apellidos');
        $email          = $request->input('email');
        $telefono       = $request->input('telefono');
        $clave          = $request->input('clave');
        
        /*
            Validamos si el email ingresado existe en la base de datos
        */
        $email_db       = LoginModel::where('email' , $email)->first();
        if($email_db)
        {
            echo json_encode(['status' => false, 'msg' => 'El email ingresado ya existe']);
            return;  
        }
        
        if(strlen($nombres) < 5)
        {
            echo json_encode(['status' => false, 'msg' => 'El nombre debe tener al menos 5 caracteres']);
            return;
        }

        if(!is_numeric($telefono))
        {
            echo json_encode(['status' => false, 'msg' => 'El teléfono solo debe tener numeros']);
            return;
        }

        if(!filter_var($email , FILTER_VALIDATE_EMAIL))
        {
            echo json_encode(['status' => false, 'msg' => 'El email ingresado no es válido']);
            return;
        }

        // Encriptamos la contraseña
        $clave          = password_hash($clave , PASSWORD_DEFAULT);

        $data_cliente   =
        [
            'rolid'     => 1,
            'nombres'   => $nombres,
            'apellidos' => $apellidos,
            'email'     => $email,
            'telefono'  => $telefono,
            'clave'     => $clave,
            'estado'    => 1
        ];

        LoginModel::insert($data_cliente);
        echo json_encode(['status' => true]);
    }

    /*
        Categorias
    */
    public function categories()
    {
        if(session('usuario') && !session('usuario')['login'])
        {
            return redirect('/');
        }
        
        $data['title']      =   'Categorías';
        $data['orders']     = VentaModel::count();

        echo view('admin.header_admin'  , $data);
        echo view('admin.categories');
        echo view('admin.footer_admin');
    } 

    public function getCategories()
    {
        
        $categories    = CategoriesModel::where('estado' , 1)
                                       ->get();
        return datatables()
                ->of($categories)
                ->addColumn('btn_categories' , 'admin.actions_categories')
                ->rawColumns(['btn_categories'])
                ->toJson(); 
    }

    public function deletecategorie(Request $request)
    {
        if(!$request->ajax()) 
        {
            echo json_encode(['status' => false, 'msg' => 'Algo pasó, intente de nuevo']);
            return;
        }

        $idcategoria     = $request->input('idcategoria');
        CategoriesModel::where('idcategoria' , $idcategoria)->update(['estado' => 0]);
        echo json_encode(['status' => true]);
    }


    public function newcategorie()
    {
        if(session('usuario') && !session('usuario')['login'])
        {
            return redirect('/');
        }

        $data['title']      = 'Nueva categoría';
        $data['orders']     = VentaModel::count();

        echo view('admin.header_admin' , $data);
        echo view('admin.newcategorie');
        echo view('admin.footer_admin');
    }


    public function add_newcategorie(Request $request)
    {
        if(!$request->ajax())
        {
            echo json_encode(['status' => false, 'msg' => 'Algo pasó, intente de nuevo']);
            return;
        }

        $descripcion        = $request->input('descripcion');
        $imagen_referencia  = $request->file(); 

        /*
            Subimos la imagen e insertamos el registro,
            Si el input está vacío, enviamos un mensaje
        */
        if(empty($imagen_referencia))
        {
            echo json_encode(['status' => false, 'msg' => 'La imagen no puede estar vacía']);
            return;
        }

        $nombre = $imagen_referencia['imagen_referencia']->getClientOriginalName();
        $imagen_referencia['imagen_referencia']->move(public_path('uploads/categorias/') , $nombre);

        $data_categoria = 
        [
            'descripcion'       => $descripcion,
            'imagen_referencia' => $imagen_referencia['imagen_referencia']->getClientOriginalName(),
            'estado'            => 1
        ];

        CategoriesModel::insert($data_categoria);
        echo json_encode(['status' => true]);
    }


    public function editcategorie($idcategoria)
    {
        $data['title']              =   'Editar categoría';
        $data['categoria']          =   CategoriesModel::where('idcategoria' , $idcategoria)->first();
        $data['orders']             =   VentaModel::count();
        $data['orders_user']        = VentaModel::count();

        echo view('admin.header_admin' , $data);
        echo view('admin.editcategorie' , $data);
        echo view('admin.footer_admin');
    }


    public function storecategorie(Request $request)
    {
        if(!$request->ajax()) 
        {
            echo json_encode(['status' => false, 'msg' => 'Algo pasó, intente de nuevo']);
            return;
        }

        $idcategoria        = $request->input('idcategoria');
        $descripcion        = $request->input('descripcion');
        $imagen_referencia  = $request->file();

        if(empty($imagen_referencia))
        {
            $data_categoria     =
            [
                'descripcion'   => $descripcion
            ];
            CategoriesModel::where('idcategoria' , $idcategoria)->update($data_categoria);
        }

        else {
            $imagen_db      = CategoriesModel::where('idcategoria' , $idcategoria)->first();
            unlink(public_path('uploads/categorias/' . $imagen_db->imagen_referencia));
            
            $imagen_referencia['imagen_referencia']->move(public_path('uploads/categorias/') , $imagen_referencia['imagen_referencia']->getClientOriginalName());

            $data_categoria     =
            [
                'descripcion'       => $descripcion,
                'imagen_referencia' => $imagen_referencia['imagen_referencia']->getClientOriginalName()
            ];

            CategoriesModel::where('idcategoria' , $idcategoria)->update($data_categoria);
        }
        
        
        echo json_encode(['status' => true, 'msg' => 'Datos actualizados']);
    }



    /*
        Órdenes
    */
    public function getOrders()
    {
        $orders    = VentaModel::orderBy('fecha' , 'DESC')->get();

        return datatables()
                ->of($orders)
                ->addColumn('btn_orders' , 'admin.action_order')
                ->rawColumns(['btn_orders'])
                ->toJson();
    }

    /*
        Actualizar órdenes
    */
    public function updateorder(Request $request)
    {
        if(!$request->ajax()) 
        {
            echo json_encode(['status' => false, 'msg' => 'Algo pasó, intente de nuevo']);
            return;
        }

        $idventa        = $request->input('idventa');
        $estado_actual  = VentaModel::where('idventa' , $idventa)->first();

        $estado         = ($estado_actual->estado == 1) ? 0 : 1; 
        $data_estado    = 
        [
            'estado' => $estado
        ];

        VentaModel::where('idventa' , $idventa)->update($data_estado);
        echo json_encode(['status' => true]);
    }


    /*
        Usuarios    
    */
    public function users()
    {
        if( session('usuario') && !session('usuario')['login'])
        {
            return redirect('/');
        }

        $data['title']              = 'Usuarios';
        $data['orders']             = VentaModel::count();
        $data['info']               = SettingsModel::first();


        echo view('admin.header_admin' , $data);
        echo view('admin.usuarios' , $data);
        echo view('admin.footer_admin');
    }


    public function getUsers()
    {
        $usuarios    = LoginModel::get();

        return Datatables()
                        ->of($usuarios)
                        ->addIndexColumn()
                        ->addColumn('action' , function($usuarios) {
                            $idusuario  =   $usuarios->idusuario;
                            $estado     =   $usuarios->estado == 1 ? 'checked' : '';
                            $btn        = '<input type="checkbox" class="check_estado" data-estado="'.$estado.'" '.$estado.' value="'. $idusuario .'">';
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
    }


    public function updateuser(Request $request)
    {
        if(!$request->ajax()) 
        {
            echo json_encode(['status' => false, 'msg' => 'Algo pasó, intente de nuevo']);
            return;
        }

        $idusuario  = $request->input('idusuario');
        $estado     = $request->input('estado');

        if($estado == 'checked')
        {
            LoginModel::where('idusuario' , $idusuario)->update(['estado' => 0]);
        }
        else {
            LoginModel::where('idusuario' , $idusuario)->update(['estado' => 1]);
        }

        echo json_encode(['status' => true, 'msg' => 'Actualizado con éxito']);
    }

    public function register()
    {
        $data['categorias']     = CategoriesModel::where('estado' , 1)
                                 ->get();

        $data['info']           = $this->info();
        $data['orders']             = VentaModel::count();
        $data['title']          = 'Registrar usuario';

        
        echo view('admin.header_admin' , $data);
        echo view('admin.register' , $data);
        echo view('admin.footer_admin');
    }

    /*
        Configurar información de la tienda
    */
    public function config_tienda()
    {
        if( session('usuario') && !session('usuario')['login'])
        {
            return redirect('/');
        }

        $data['title']              = 'Información';
        $data['orders']             = VentaModel::count();
        $data['info']               = SettingsModel::first();


        echo view('admin.header_admin' , $data);
        echo view('admin.config_tienda' , $data);
        echo view('admin.footer_admin');
    }

    /*
        Actualizar información
    */
    public function store_settings(Request $request)
    {
        if(!$request->ajax())
        {
            echo json_encode(['status' => false, 'msg' => 'Algo pasó, no se pudo actualizar']);
            return;
        }

        $idregistro     = $request->input('idregistro');
        $telefono       = $request->input('telefono');
        $correo         = $request->input('correo');
        $hora_entrada   = $request->input('hora_entrada');
        $hora_salida    = $request->input('hora_salida');
        $facebook       = $request->input('facebook');
        $twitter        = $request->input('twitter');
        $instagram      = $request->input('instagram');
        $logo           = $request->file();



        /*
            Si el file llega vacío solo actualizamos los demas campos, en caso de haber file actualizamos la imagen
        */
        if( empty( $logo ) )
        {
            $data_info =
            [
                'telefono'      => $telefono,
                'correo'        => $correo,
                'hora_entrada'  => $hora_entrada,
                'hora_salida'   => $hora_salida,
                'url_facebook'  => $facebook,
                'url_twitter'   => $twitter,
                'url_instagram' => $instagram
            ];

            SettingsModel::where('registro' , $idregistro)->update($data_info);
        }
        else {

            foreach($logo as $log)
            {
                $nombre_logo     = $log->getClientOriginalName(); 
                $actual          = SettingsModel::where('registro' , $idregistro)->first()['logo'];
                if($nombre_logo == $actual)
                {
                    unlink(public_path('img/logo/' . $actual));
                    $log->move(public_path('img/logo/') , $nombre_logo);
                }
                else 
                {
                    $log->move(public_path('img/logo/') , $nombre_logo);
                }
            }

            $data_info =
            [
                'telefono'      => $telefono,
                'correo'         => $correo,
                'hora_entrada'  => $hora_entrada,
                'hora_salida'   => $hora_salida,
                'url_facebook'  => $facebook,
                'url_twitter'   => $twitter,
                'url_instagram' => $instagram,
                'logo'          => $nombre_logo
            ];

            SettingsModel::where('registro' , $idregistro)->update($data_info);
        }

        echo json_encode(['status' => true, 'msg' => 'Datos actualizados']);
    }


    public function loadlogo(Request $request)
    {
        if(!$request->ajax())
        {
            echo json_encode(['status' => false, 'msg' => 'Algo pasó, no se pudo actualizar']);
            return;
        }

        
        $logo         = SettingsModel::first()['logo'];

        echo json_encode(['status' =>  true, 'logo' => $logo]);
    }


    public function searchproduct(Request $request)
    {
        if(!$request->ajax())
        {
            echo json_encode(['status' => false, 'msg' => 'Algo pasó, no se pudo actualizar']);
            return;
        }

        $palabra                = $request->input('palabra');
        $resultados             = ProductModel::select('productos.*', 'ca.descripcion as categoria', 'img.imagen as imagen')
                                    ->join('categorias as ca' , 'ca.idcategoria' , '=' , 'productos.categoriaid')
                                    ->join('imagenes_producto as img' , 'img.productoid', '=' , 'productos.idproducto')
                                    ->distinct('img.productoid')
                                    ->where('productos.estado' , 1)
                                    ->where('nombre' , 'LIKE', '%' . $palabra . '%')
                                    ->get();

        $categories             = CategoriesModel::where('estado' , 1)
                                                ->orderBy('descripcion', 'ASC')
                                                ->get();

        $prod_cate              = [];
        foreach($categories as $categorie) {
            $prod_cate[] = count(ProductModel::where('categoriaid' , $categorie->idcategoria)->where('estado' , 1)->get());
        }   

        $product_categorie = $prod_cate;

        if(count($resultados) == 0) 
        {
            echo json_encode(['status' => false]);
            return;
        }

        else 
        {
            echo json_encode([
                'status'            => true, 
                'productos'         => $resultados, 
                'categories'        => $categories, 
                'product_categorie' => $product_categorie,
                'route'             => url('/')
            ]);
        }


    }



}

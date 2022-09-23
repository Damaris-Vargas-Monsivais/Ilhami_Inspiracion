<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


use App\Models\LoginModel;
use App\Models\ProductModel;
use App\Models\SettingsModel;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function create_cart()
    {
    	/*
			Comparamos si no existe sesión o si existen productos en el carrito, 
            creamos el contenido de la variable y seteamos la sesion.
			De lo contrario calculamos los totales.
    	*/

        if(!session()->get('cart') || empty(session()->get('cart')['productos']))
        {
            $cart = 
            [
                'cart' =>
                [
                    'productos'     => [],
                    'subtotal'      => 0,
                    'total'         => 0,
                    'envio'         => 0
                ]
            ];

            session($cart);
            return session()->get('cart');
        }

       
        $subtotal   = 0;
        $total      = 0;
        $envio      = 10;

        foreach(session('cart')['productos'] as $index => $producto)
        {
            $_subtotal = ((int) $producto['precio'] * (int) $producto['cantidad']);
            $subtotal  = $subtotal + $_subtotal;
            session()->put('cart.productos.' . $index , $producto);
        }

        $total      = $subtotal;

        $cart = 
            [
                'cart' =>
                [
                    'productos'     => session('cart')['productos'],
                    'subtotal'      => $subtotal,
                    'total'         => $total,
                    'envio'         => $envio
                ]
            ];


        session($cart);
        return session()->get('cart');

    }


    /*
        Agregar un producto al carrito
    */
    public function add_productcart($idproduct , $cantidad)
    {
        $product        = ProductModel::select('productos.*' , 'img.imagen as imagen', 'ca.descripcion as categoria')
                                    ->join('imagenes_producto as img' , 'img.productoid', '=' , 'productos.idproducto')
                                    ->join('categorias as ca' , 'ca.idcategoria', '=' , 'productos.categoriaid')
                                    ->where('productos.estado' , 1)
                                    ->where('idproducto' , $idproduct)
                                    ->first();

        if(!$product)
        {
            return false;
        }

        $new_product    =
        [
            'idproducto'    => $product->idproducto,
            'categoria'     => $product->categoria,
            'nombre'        => $product->nombre,
            'descripcion'   => $product->descripcion,
            'cantidad'      => $cantidad,
            'precio'        => $product->precio,
            'stock'         => $product->stock,
            'sku'           => $product->sku,
            'imagen'        => $product->imagen
        ];

        /*
            Si los productos del carrito están vacíos entonces lo agregamos
        */

        if( empty(session()->get('cart')['productos']) )
        {
            session()->push('cart.productos' , $new_product);
            return true;
        }

        /*
            Si no, al menos ya hay uno, entonces lo recorremos
        */
        foreach(session()->get('cart')['productos'] as $index => $product)
        {
            /*
                Si el id del producto ingresado coincide con el id del producto del bucle, sumamos la cantidad,
                de lo contrario, asimilamos que es un producto nuevo y agregamos
            */
            if($idproduct == $product['idproducto']) {
                $product['cantidad'] = $product['cantidad'] + $cantidad;
                session()->put('cart.productos.' . $index , $product);
                return true;
            }

        }

        session()->push('cart.productos' , $new_product);
        return true;

    }



    /*
        Remover un producto del carrito
    */
    public function delete_productcart($idproduct)
    {

        /*
            Validamos si existen productos en el carrito, si en caso hay, empezamos a recorrer entre los productos
        */
        if(empty(session()->get('cart')['productos']))
        {
            return false;
        }


        foreach( session()->get('cart')['productos'] as $index => $product)
        {
            /*
                Si el id del producto entrante coincide con el id del producto del ciclo
                eliminamos el registro
            */

            if($idproduct == $product['idproducto'])
            {
                session()->forget('cart.productos.' . $index , $product);
                return true;
            }

            return false;
        }
    }


    /*
        Actualizar la cantidad de un producto
    */
    public function update_cantidad($idproduct , $cantidad)
    {
        if(empty(session()->get('cart')['productos']))
        {
            return false;
        }

        foreach(session()->get('cart')['productos'] as $index => $product)
        {
            if($idproduct == $product['idproducto'])
            {
                $product['cantidad']    =  $cantidad;
                session()->put('cart.productos.' . $index , $product);
                return true;
            }
        }
    }


    /*
        Eliminar el carrito de compras
    */
    public function destroy_cart()
    {
        if(!session()->get('cart') || empty( session()->get('cart')['productos']) )
        {
            return false;
        }

        session()->forget('cart');
        return true;
    }


    /*
        Obtener la cantidad de productos existentes
    */
    public function get_cantproductscart()
    {
        $cantidad = 0;
        if(!session()->get('cart') || empty( session()->get('cart')['productos']) )
        {
            $cantidad = 0;
            return $cantidad;
        }

        foreach( session()->get('cart')['productos'] as $index => $product)
        {
            $cantidad = $cantidad + $product['cantidad'];
        }

        return $cantidad;
    }


    /*
        Información de la tienda    
    */

    public function info()
    {
        $info       = SettingsModel::first();
        $sesion     =
        [
            'telefono'      => $info->telefono,
            'email'         => $info->email,
            'hora_entrada'  => $info->hora_entrada,
            'hora_salida'   => $info->hora_salida,
            'url_facebook'  => $info->url_facebook,
            'url_twitter'   => $info->url_twitter,
            'url_instagram' => $info->url_instagram,
            'logo'          => $info->logo
        ];
        return session('info' , $sesion);
    }

}

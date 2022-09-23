<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriesModel;
use App\Models\ProductModel;

class CartController extends Controller
{
    public function index()
    {
    	$data['categorias']     = CategoriesModel::where('estado' , 1)
                                 ->get();

        $data['info']           = $this->info();                         

    	echo view('layouts.header' , $data);
    	echo view('cart');
    	echo view('layouts.footer' , $data);
    }


	/*
		Cargar el carrito de compras
	*/

    public function getcart(Request $request)
    {
    	if(!$request->ajax())
    	{
    		echo json_encode(['status' => false, 'msg' => 'Algo pasó, intente de nuevo']);
    		return;
    	}

    	$cart 		= $this->create_cart();
    	$html_cart 	= '';
    	if(empty($cart['productos']))
    	{
    		$html_cart .= '<div class="text-center"><img src="'. url("img/shop/cart/empty_cart.png") .'"><p class="text-danger">No hay productos en el carrito</p></div><div class="shopping-cart-footer"><div class="column"><a class="btn btn-outline-secondary" href="'. route("products") .'"><i class="icon-arrow-left"></i>&nbsp; Volver</a></div></div>';
    	}

    	else {
    		$html_cart .= '<div class="table-responsive shopping-cart">
					        <table class="table">
					          <thead>
					            <tr>
					              <th>Producto</th>
					              <th class="text-center">Cantidad</th>
					              <th class="text-center">Subtotal</th>
					              <th class="text-center">Total</th>
					              <th class="text-center">
					                <a class="btn btn-sm btn-outline-danger btn_removecart" href="#">Limpiar carrito</a>
					              </th>
					            </tr>
					          </thead>

					          <tbody>';
					          foreach($cart['productos'] as $product):
					          $html_cart .= '<tr>
					              <td>
					                <div class="product-item">
					                <a class="product-thumb" href=""><img src="'. url("uploads/" . $product["imagen"]) .'" alt="Product"></a>
					                  <div class="product-info">
					                    <h4 class="product-title">
					                      '. $product["nombre"] .'
					                    </h4>
					                    <span>
					                      <em>Categoría:</em> '. $product["categoria"] .'
					                    </span>
					                  </div>
					                </div>
					              </td>

					              <td class="text-center">
					                <div class="count-input">
					                  <input type="number" class="form-control text-center input_cantidad" data-idproducto="'. $product["idproducto"] .'" value="'. $product["cantidad"] .'" data-stock="'. $product["stock"] .'">
					                </div>
					              </td>

					              <td class="text-center text-lg">$'. number_format($product["precio"], 2, ".", " ") .'</td>
					              <td class="text-center text-lg">$'. number_format(($product["precio"] * $product["cantidad"]), 2, ".", " ") .'</td>
					              <td class="text-center">
					                <a class="remove-from-cart btn_removeproduct" href="" data-toggle="tooltip" title="Quitar producto" data-idproducto="'. $product["idproducto"] .'">
					                  <i class="icon-x"></i>
					                </a>
					              </td>
					            </tr>';
					           endforeach;
					          $html_cart .= '</tbody>
					        </table>
					      </div>

					      <div class="shopping-cart-footer">
					        <div class="column text-lg">
					          <span class="text-muted">Total:&nbsp; <small class="text-muted"> (+envío)</small></span>
					          <span class="text-gray-dark">$'. number_format(($cart["total"] + $cart["envio"]), 2, ".", " ") .'</span></div>
					      </div>

					      <div class="shopping-cart-footer">
					        <div class="column">
					          <a class="btn btn-outline-secondary" href="'. route("products") .'">
					            <i class="icon-arrow-left"></i>&nbsp;Seguir comprando
					          </a>
					        </div>

					        <div class="column">
					          <a class="btn btn-primary" href="'. route("datos_envio") .'">Continuar</a>
					        </div>
					      </div>';
    	}


    	echo json_encode(['status' => true, 'html_cart' => $html_cart]);
    }


    /*
		Agregar un producto al carrito de compras
	*/

    public function add_cartproduct(Request $request)
    {
		if(!$request->ajax())
    	{
    		echo json_encode(['status' => false, 'msg' => 'Algo pasó, intente de nuevo']);
    		return;
    	}

    	$idproduct 		= $request->input('idproducto');
    	$cantidad 		= $request->input('cantidad');

    	$add_product 	= $this->add_productcart($idproduct , $cantidad);
    	if(!$add_product)
    	{
    		echo json_encode(['status' => false, 'msg' => 'No se pudo agregar el producto']);
    		return;
    	}

    	echo json_encode(['status' => true, 'msg' => 'Agregado correctamente']);
    }


    /*
		Eliminar un producto del carrito
	*/

    public function removeproductcart(Request $request)
    {
    	if(!$request->ajax())
    	{
    		echo json_encode(['status' => false, 'msg' => 'Algo pasó, intente de nuevo']);
    		return;
    	}

    	$idproduct 			= $request->input('idproducto');
    	$remove_product 	= $this->delete_productcart($idproduct);	

    	if(!$remove_product)
    	{
			echo json_encode(['status' => false, 'msg' => 'No se pudo quitar el producto']);
    		return;
    	}

    	echo json_encode(['status' => true, 'msg' => 'Producto quitado']);
    }


    /*
		Vaciar el carrito de compras
	*/
    public function removecart(Request $request)
    {
    	if(!$request->ajax())
    	{
    		echo json_encode(['status' => false, 'msg' => 'Algo pasó, intente de nuevo']);
    		return;
    	}

    	if(!$this->destroy_cart())
    	{
    		echo json_encode(['status' => false, 'msg' => 'No se pudo vaciar el carrito']);
    		return;
    	}

    	echo json_encode(['status' => true, 'msg' => 'Carrito vaciado']);
    }


    /*
        Cantidad de productos en el carrito
    */
    public function cantproductscart(Request $request)
    {
        if(!$request->ajax())
        {
            echo json_encode(['status' => false, 'msg' => 'Algo pasó, intente de nuevo']);
            return;
        }

        $cantidad = $this->get_cantproductscart();
        echo json_encode(['status' => true, 'cantidad' => $cantidad]);
    }


    /*
        Actualizar cantidad datos de input number
    */

    public function update_cantproduct(Request $request)
    {
        if(!$request->ajax())
        {
            echo json_encode(['status' => false, 'msg' => 'Algo pasó, intente de nuevo']);
            return;
        }

        $idproduct      = $request->input('idproducto');
        $cantidad       = $request->input('cantidad');
    

        if(!$this->update_cantidad($idproduct, $cantidad))
        {
            echo json_encode(['status' => false, 'msg' => 'No se pudo actualizar']);
            return;
        }

        echo json_encode(['status' => true, 'msg' => 'Cantidad actualizada']);
    }


	public function datos_envio()
	{
		$data['categorias']     = CategoriesModel::where('estado' , 1)
                                 ->get();

        $data['info']           = $this->info();                         

    	echo view('layouts.header' , $data);
    	echo view('datos_envio');
    	echo view('layouts.footer' , $data);
	}


	public function validar_cliente(Request $request)
	{
		if(!$request->ajax())
		{
			echo json_decode(['status' => false]);
			return;
		}

		$email_cliente		= $request->input('email_cliente');
		$direccion_cliente	= $request->input('direccion_cliente');

		$datos_cliente 		=
		[
			'email_cliente'		=> $email_cliente,
			'direccion_cliente'	=> $direccion_cliente
		];

		$request->session()->put('datos_cliente' , $datos_cliente);
		echo json_encode(['status' => true]);
	}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriesModel;
use App\Models\VentaModel;
use App\Models\DetalleVentaModel;
use Barryvdh\DomPDF\Facade as PDF;

class CheckoutController extends Controller
{
    public function checkout()
    {   
    	$cart 					= $this->create_cart();

    	if( empty( $cart['productos'] ))
    	{
    		return redirect('/');
    	}

    	$data['categorias']    = CategoriesModel::where('estado' , 1)
                                 ->get();


        // Aquí ingresas tu clave secreta (sk)
        \Stripe\Stripe::setApiKey('sk_test_51IdMnFHTbfxeD8f4G7bkdKg1CJLgIzO2l73CbbaAVXbNE4Xj0kPAecaYHfAcMXhSCBpA9a2Liqw4Xiil5K0SxQ6200taEt145k');
        		
		$amount = ( ($cart['total'] + $cart['envio']) * 100);
        
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' 			=> 'Pago por Stripe',
			'amount' 				=> $amount,
			'currency' 				=> 'MXN',
			'description' 			=> 'Pago de productos',
			'payment_method_types' 	=> ['card'],
		]);

		$data['intent'] 			= $payment_intent->client_secret;
		$data['amount']				= $payment_intent->amount;
        $data['info']               = $this->info();

		echo view('layouts.header' , $data);
		echo view('checkout.checkout' , $data);
		echo view('layouts.footer' , $data);

    }

    public function checkout_success(Request $request)
    {
    	if(!$request->ajax())
    	{
    		echo json_encode(['status' => false, 'msg' => 'Algo pasó, intente de nuevo']);
    		return;
    	}

    	$idpago			= $request->input('idventa');
		$estado 		= $request->input('estado');



		// Guardo el pdf
		$data['cart']		= $this->create_cart();
		$data['contador'] 	= 1;

		$pdf                = PDF::loadView('pruebita' , $data);
		$nombre_pdf 		= date('Y-m-d-H-i-s') . '.pdf';
		$pdf->save( 'uploads/reportes/' .  $nombre_pdf);

    	// Agrego a la tabla ventas
    	$data_ventas 	= 
    	[
    		'pagoid'	=> $idpago,
    		'fecha'		=> date('Y-m-d'),
    		'email'		=> session()->get('datos_cliente')['email_cliente'],
    		'direccion'	=> session()->get('datos_cliente')['direccion_cliente'],
    		'resumen'	=> $nombre_pdf,
    		'estado'	=> 1
    	];

    	/*
			Insertamos a ventas con la intención de obtener su id
			que servirá para la table detalle
    	*/
		VentaModel::insert($data_ventas);
		$idventa 		= VentaModel::latest('idventa')->first();

		foreach(session()->get('cart')['productos'] as $producto) {
    		$data_detalle	=
	    	[
	    		'ventaid'			=> $idventa->idventa,
	    		'productoid' 		=> $producto['idproducto'],
	    		'precio_unitario'	=> $producto['precio'],
	    		'cantidad'			=> $producto['cantidad']
	    	];
    		
    		DetalleVentaModel::insert($data_detalle);
    	}

    	/*
			Removemos la sesión del carrito
    	*/
    	$this->destroy_cart();


    	/*
			Validamos si el pago se realizó correctamente
		*/
		if($estado != 'succeeded')
		{
			echo json_encode(['status' => false, 'msg' => 'El pago no pudo ser completado']);
    		return;
		}

    	echo json_encode(['status' => true]);
    }
}

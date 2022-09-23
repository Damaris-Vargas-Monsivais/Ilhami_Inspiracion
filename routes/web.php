<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CheckoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/' 									, [HomeController::class 	, 'index'])->name('home');
Route::get('products' 							, [ProductController::class , 'index'])->name('products');

/*
	Carrito de compras
*/
Route::get('cart' 								, [CartController::class 	, 'index'])->name('cart');
Route::post('cart/getcart'						, [CartController::class 	, 'getcart'])->name('getcart');
Route::post('cart/add_cartproduct'				, [CartController::class 	, 'add_cartproduct'])->name('add_cartproduct');
Route::post('cart/removeproductcart'			, [CartController::class 	, 'removeproductcart'])->name('removeproductcart');
Route::post('cart/removecart'					, [CartController::class 	, 'removecart'])->name('removecart');
Route::post('cart/cantproductscart'				, [CartController::class 	, 'cantproductscart'])->name('cantproductscart');
Route::post('cart/update_cantproduct'			, [CartController::class 	, 'update_cantproduct'])->name('update_cantproduct');

/*
	Usuario
*/
Route::get('login' 								, [LoginController::class , 'index'])->name('login');
Route::post('login/sesion'						, [LoginController::class , 'sesion'])->name('sesion');
Route::get('login/logout'						, [LoginController::class , 'logout'])->name('logout');


Route::get('admin/editperfil/{idproducto}'  	, [UserController::class , 'editperfil'])->name('editperfil');
Route::post('admin/storeperfil'					, [UserController::class , 'storeperfil'])->name('storeperfil');
Route::get('admin/categories'  					, [AdminController::class , 'categories'])->name('admin.categories');
Route::post('admin/add_newcategorie'			, [AdminController::class , 'add_newcategorie'])->name('add_newcategorie');
Route::get('admin/getCategories'  				, [AdminController::class , 'getCategories'])->name('getCategories');
Route::post('admin/deletecategorie'				, [AdminController::class , 'deletecategorie'])->name('deletecategorie');
Route::get('admin/newcategorie'   				, [AdminController::class , 'newcategorie'])->name('admin.newcategorie');
Route::post('admin/storecategorie'				, [AdminController::class , 'storecategorie'])->name('storecategorie');

/*
	Admin
*/
Route::get('admin' 								, [AdminController::class 	, 'index'])->name('admin');
Route::get('admin/orders'  						, [AdminController::class 	, 'orders'])->name('orders');
Route::post('admin/updateorder'					, [AdminController::class 	, 'updateorder'])->name('updateorder');


Route::get('admin/products'  					, [AdminController::class 	, 'products'])->name('admin.products');
Route::get('admin/newproduct'   				, [AdminController::class 	, 'newproduct'])->name('admin.newproduct');
Route::post('admin/add_newproduct'				, [AdminController::class 	, 'add_newproduct'])->name('add_newproduct');
Route::post('admin/add_newproducto'				, [AdminController::class 	, 'add_newproducto'])->name('add_newproducto');
Route::post('admin/store_product'				, [AdminController::class 	, 'store_product'])->name('store_product');
Route::post('admin/loadimagesid'				, [AdminController::class 	, 'loadimagesid'])->name('loadimagesid');
Route::post('admin/loadimagesidcat'				, [AdminController::class 	, 'loadimagesidcat'])->name('loadimagesidcat');
Route::post('admin/deleteproduct'				, [AdminController::class 	, 'deleteproduct'])->name('deleteproduct');
Route::get('admin/getProducts'					, [AdminController::class 	, 'getProducts'])->name('getProducts');
Route::post('admin/newrecord'					, [AdminController::class 	, 'newrecord'])->name('newrecord');

Route::get('admin/editproduct/{idproducto}'  	, [AdminController::class 	, 'editproduct'])->name('editproduct');
Route::get('admin/editcategorie/{idproducto}'  	, [AdminController::class 	, 'editcategorie'])->name('editcategorie');


Route::get('admin/myorders/{idusuario}' 		, [AdminController::class   , 'myorders'])->name('myorders');
Route::get('admin/getOrdersusuario/{idusuario}' , [AdminController::class   , 'getOrdersusuario'])->name('getOrdersusuario');
Route::get('admin/getOrders'					, [AdminController::class   , 'getOrders'])->name('getOrders');


Route::get('admin/users'						, [AdminController::class   , 'users'])->name('admin.users');
Route::get('admin/getUsers'						, [AdminController::class   , 'getUsers'])->name('getUsers');
Route::post('admin/updateuser'				    , [AdminController::class   , 'updateuser'])->name('admin.updateuser');
Route::get('admin/register'						, [AdminController::class   , 'register'])->name('register');

Route::get('admin/settings'			 			, [AdminController::class   , 'config_tienda'])->name('config_tienda');
Route::post('admin/store_settings' 				, [AdminController::class   , 'store_settings'])->name('store_settings');
Route::post('admin/loadlogo' 					, [AdminController::class   , 'loadlogo'])->name('loadlogo');

Route::post('getcantstock' 					    , [ProductController::class , 'getcantstock'])->name('getcantstock');
Route::get('products-categorie/{idcategoria}'  	, [ProductController::class , 'products_categorie'])->name('products-categorie');
Route::get('product-detail/{idproducto}' 		, [ProductController::class , 'detail'])->name('product-detail');


//Route::get('pruebis' 							, [ProductController::class  , 'pruebis'])->name('pruebis');
Route::get('shipping_information' 				, [CartController::class  , 'datos_envio'])->name('datos_envio');
Route::post('validar_cliente' 					, [CartController::class  , 'validar_cliente'])->name('validar_cliente');

Route::get('checkout' 							, [CheckoutController::class , 'checkout'])->name('checkout');
Route::post('checkout_success'					, [CheckoutController::class , 'checkout_success'])->name('checkout_success');

Route::post('admin/searchproduct' 				, [AdminController::class, 'searchproduct'])->name('searchproduct');
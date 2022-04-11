<?php
//use App\Http\Controllers\BarcodeGeneratorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\SetArticuloController;

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

Route::get('/', function () {
    return view('auth.login');
});

 Route::get( 'imprimir' , [ArticuloController::class, 'barra'])->name('articulo.imprimirBarra');
 Route::get('/articulo/pdf', [ArticuloController::class, 'createPDF'])->name('articulo.pdf');

 Route::get( 'impresion' , [ArticuloController::class, 'impresion'])->name('articulo.impresion');

 Route::get( 'imprimirsetarticulo' , [SetArticuloController::class, 'barra'])->name('setarticulo.imprimirBarra');
 Route::get('/setarticulo/pdf', [SetArticuloController::class, 'createPDF'])->name('setarticulo.pdf');

 Route::get( 'impresion2' , [SetArticuloController::class, 'impresion2'])->name('setarticulo.impresion2');



Route::resource('categorias','App\Http\Controllers\CategoriaController');
Route::resource('sectors','App\Http\Controllers\SectorController');
Route::resource('sedes','App\Http\Controllers\SedeController');
Route::resource('articulos','App\Http\Controllers\ArticuloController');
Route::get('/setarticulos/{id}/editcart','App\Http\Controllers\SetArticuloController@editCart');
Route::post('/setarticulos/{id}/editcart','App\Http\Controllers\SetArticuloController@updateCart');
Route::post('setarticulos/{id}','App\Http\Controllers\SetArticuloController@destroyArticuloSet')->name('setarticulos.destroyArticuloSet');
Route::resource('setarticulos','App\Http\Controllers\SetArticuloController');
Route::post('setarticulos','App\Http\Controllers\SetArticuloController@update');

Route::post('setarticulos','App\Http\Controllers\SetArticuloController@store');
Route::post('/cart-add', 'App\Http\Controllers\CartController@add')->name('cart.add');     
Route::get('/cart-checkout', 'App\Http\Controllers\CartController@checkout')->name('cart.checkout');   
Route::post('/cart-removeitem', 'App\Http\Controllers\CartController@removeitem')->name('cart.removeitem');      



Route::resource('users','App\Http\Controllers\UserController');
Route::resource('marcas','App\Http\Controllers\MarcaController');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');





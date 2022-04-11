<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Articulo;
//  use Darryldecode\Cart\Cart;
// use Darryldecode\Cart\Cart;
// use Darryldecode\Cart\Cart;
use App\Models\SetArticulo;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
 

class CartController extends Controller
{
   
  public function add(Request $request){
  
    $articulo= Articulo::find($request->articulo_id);
    //  dd($articulo);
    // dd($request->articulo_id);

    \Cart::add(array(

       'id'=>$articulo->id,
       'name'=> $articulo->codigo,
     

       'price' => $articulo->estante,
       'quantity' => 1,
       'attributes' => array(),
   
    ));
    
        
    
    return back()->with('success',"$articulo->nombre !se ha agregado con exito al carrito!");
  }


public function checkout() {
    return view ('setarticulo.checkout');
}

public function store(Request $request){

  // $id = IdGenerator::generate(['table' => 'set_articulos', 'field' => 'codigo', 'length' => 8, 'prefix' => date('1')]);

  // $setarticulos = new SetArticulo();

  // $setarticulos->codigo = $id;
  // $setarticulos->categoria_id = $request->get('categoria_id');
  // $setarticulos->marca_id = $request->get('marca_id');
  // $setarticulos->serial = $request->get('serial');
  // $setarticulos->estante = $request->get('estante');
  // $setarticulos->faja = $request->get('faja');
  // $setarticulos->precinto = $request->get('precinto');
  // $setarticulos->descripcion = $request->get('descripcion');
  // $setarticulos->estado = $request->get('estado');
  // $setarticulos->sede=$request->get('sede');
  // $setarticulos->sede=$request->get('piso');
  // $setarticulos->sede=$request->get('sector');
  // $setarticulos->sede=$request->get('puesto');
  // $setarticulos->sede=$request->get('responsable');
  // $setarticulos->sede=$request->get('sucursal');
  // $setarticulos->sede=$request->get('estado');




  // $setarticulos->save();

  // return redirect('articulos');






}


public function removeitem(Request $request){
   
   \Cart::remove([
       'id'=> $request->id,
       
   ]);
   return back()->with('success',"articulo eliminado de su carrito con exito");

}

public function clear(){
    Cart::clear();
    return back()->with('success',"The shopping cart has successfullly beed added to the shopping cart!");
}




}

<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Articulo;

// use App\Models\Categoria;
use App\Models\Categoria;
use App\Models\Gabinete;
use App\Models\SetArticulo;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use League\CommonMark\Extension\FrontMatter\FrontMatterParser;
use PDF;

class GabineteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gabinetes = Gabinete::all();
        foreach (\Cart::getContent() as $articuloCarrito) {
            \Cart::clear($articuloCarrito->id);
        }

        return view('gabinete.index')->with('gabinetes', $gabinetes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $articulos = Articulo::all();
        $categorias = Categoria::orderBy('nombre')->get();
        $marcas = Marca::orderBy('nombre')->get();
        //return view('gabinete.create')->with('articulos', $articulos);
        return view('gabinete.create', compact('categorias', 'articulos','marcas'));



        // return view('setarticulo.create');
    }
    public function cart()

    {

        return view('gabinete.cart');


        // return view('setarticulo.create');
    }







    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = IdGenerator::generate(['table' => 'gabinetes', 'field' => 'codigo', 'length' => 2, 'prefix' => date('1')]);

        $gabinetes = new Gabinete();

        $gabinetes ->codigo = $id;
        $gabinetes->categoria_id = $request->get('categoria_id');
        $gabinetes->marca_id = $request->get('marca_id');
        $gabinetes->serial = $request->get('serial');
        $gabinetes->estante = $request->get('estante');
        $gabinetes->faja = $request->get('faja');
        $gabinetes->precinto = $request->get('precinto');
        $gabinetes->descripcion = $request->get('descripcion');

        // $gabinetes ->sede = $request->get('sede');
        // $gabinetes ->piso = $request->get('piso');
        // $gabinetes ->sector = $request->get('sector');
        // $gabinetes ->puesto = $request->get('puesto');
        // $gabinetes ->responsable = $request->get('responsable');
        // $gabinetes ->dni = $request->get('dni');
        // $gabinetes ->serial = $request->get('serial');
        $gabinetes ->estado = $request->get('estado');
        //  $gabinetes ->ip= $request->get('ip');



        $gabinetes ->save();
        foreach (\Cart::getContent() as $articuloCarrito) {
            $articulo = Articulo::find($articuloCarrito->id);
            $articulo->update(['id_gabinete' => $gabinetes ->id, 'estado' => $gabinetes ->estado]);
        }

        foreach (\Cart::getContent() as $articuloCarrito) {
            \Cart::clear($articuloCarrito->id);
        }

        // $articulos = \DB::table('articulos')
        //     ->where('id_setarticulo',$setarticulos->id)
        //     ->get();

           

        // dd($articulos);

        return redirect('/gabinetes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Gabinete $gabinete)
    {
        return view('gabinete.show', compact('gabinete'));
    }

    public function barra(Request $request)
    {

        $gabinetes =Gabinete::all();
        // dd($setarticulos);
        return view('gabinete.barras')->with('gabinetes', $gabinetes);
    }
    public function createPDF()
    {


        $gabinetes = Gabinete::all();

        view()->share('gabinetes', $gabinetes);

        return $pdf = PDF::loadView('gabinete.barras', $gabinetes);

        //return $pdf->download('archivo-pdf.pdf');
    }
    public function impresion3()
    {
        $gabinetes = Gabinete::all();
        return view('gabinete.impresion')->with('gabinetes', $gabinetes);

        //return view('articulo.impresion', compact('articulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $gabinetes = Gabinete::find($id);



        return view('gabinete.edit')->with('gabinetes', $gabinetes);
    }
    public function editCart($id_gabinete)
    {


        $gabinete = Gabinete::find($id_gabinete);



        $articulos = Gabinete::find($id_gabinete)->articulos;
        //  dd($articulos->id);

        //  foreach ($articulos as $articulo) {
        //     dd($articulo->id); 
        // }         
       
        $articuloIds = $articulos->map(function ($articulo) {
            return $articulo->id;
        });   


        // dd($articuloIds);



        $articulosTotal = Articulo::all();

        foreach ($articulos as $articulo) {
            \Cart::add(array(

                'id' => $articulo->id,
                'name' => $articulo->codigo,


                // 'price' => $articulo->estante,
                'price' => 0,
                'quantity' => 1,
                'attributes' => array(),

            ));
        }




        return view('gabinete.editcart', compact('articulosTotal', 'id_gabinete' , 'articuloIds'));
        
        // return view('setarticulo.editcart', compact('articulosTotal', 'id_gabinete', 'gabinete'));

        
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    //     //   ]);
    //     $gabinete = Gabinete::find($id);



    //     $gabinete->serial = $request->get('serial');
    //     $gabinete->estante = $request->get('estante');
    //     $gabinete->faja = $request->get('faja');
    //     $gabinete->precinto = $request->get('precinto');
    //     $gabinete->descripcion = $request->get('descripcion');
    //     $gabinete->estado = $request->get('estado');

        
        
      
       

    //     $gabinete->save();

       

       

       


        
        




    //     return redirect('/gabinetes')->with('actualizar', 'ok');
    // }

    public function update(Request $request, $id)
    {
        $gabinete = Gabinete::find($id);
        $gabinete->serial = $request->get('serial');
        $gabinete->estante = $request->get('estante');
        $gabinete->faja = $request->get('faja');
        $gabinete->precinto = $request->get('precinto');
        $gabinete->descripcion = $request->get('descripcion');
    
        // actualizar el estado
        $estadoAnterior = $gabinete->estado;
        $nuevoEstado = $request->get('estado');
        $gabinete->estado = $nuevoEstado;
    
        // verificar si el estado ha cambiado y actualizar id_setarticulo
        if ($estadoAnterior != $nuevoEstado) {
            $gabinete->id_setarticulo = null;
        }
    
        $gabinete->save();
    
        return redirect()->route('gabinetes.index')->with('success', 'Gabinete actualizado correctamente.');
    }
    






    public function updateCart($id)
    {
        foreach (\Cart::getContent() as $articuloCarrito) {
            $articulo = Articulo::find($articuloCarrito->id);
            $articulo->update(['id_gabinete' => $id ,'estado' => "Asignado"]);
        }





        return redirect('/gabinetes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gabinete = Gabinete::find( $id);

        $articulos = $gabinete->articulos;
        foreach ($articulos as $articulo) {
           
            $articulo->update(['id_gabinete' => null, 'estado' => 'Deposito']);
            $articulo->save();
        }
        $gabinete->delete();

        return redirect('gabinetes')->with('eliminar', 'ok');
    }



    // public function destroyArticuloSet($id)
    // {
    //     $articulo = Articulo::find($id);
    //     // $articulo->id_setarticulo = null;
    //     $articulo->update(['id_setarticulo' => null, 'estado' => 'Deposito']);
    //     $articulo->save();



    //     return redirect('/setarticulos')->with('eliminar', 'ok');
    // }
}

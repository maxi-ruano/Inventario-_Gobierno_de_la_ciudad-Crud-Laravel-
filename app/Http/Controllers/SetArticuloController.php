<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Articulo;

use App\Models\Categoria;
use App\Models\SetArticulo;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use League\CommonMark\Extension\FrontMatter\FrontMatterParser;
use PDF;

class SetArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setarticulos = SetArticulo::all();
        foreach (\Cart::getContent() as $articuloCarrito) {
            \Cart::clear($articuloCarrito->id);
        }

        return view('setarticulo.index')->with('setarticulos', $setarticulos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $articulos = Articulo::all();
        return view('setarticulo.create')->with('articulos', $articulos);



        // return view('setarticulo.create');
    }
    public function cart()

    {

        return view('setarticulo.cart');


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
        $id = IdGenerator::generate(['table' => 'set_articulos', 'field' => 'codigo', 'length' => 2, 'prefix' => date('1')]);

        $setarticulos = new SetArticulo();

        $setarticulos->codigo = $id;

        $setarticulos->sede = $request->get('sede');
        $setarticulos->piso = $request->get('piso');
        $setarticulos->sector = $request->get('sector');
        $setarticulos->puesto = $request->get('puesto');
        $setarticulos->responsable = $request->get('responsable');
        $setarticulos->dni = $request->get('dni');
        $setarticulos->serial = $request->get('serial');
        $setarticulos->estado = $request->get('estado');



        $setarticulos->save();
        foreach (\Cart::getContent() as $articuloCarrito) {
            $articulo = Articulo::find($articuloCarrito->id);
            $articulo->update(['id_setarticulo' => $setarticulos->id, 'estado' => $setarticulos->estado]);
        }

        foreach (\Cart::getContent() as $articuloCarrito) {
            \Cart::clear($articuloCarrito->id);
        }

        // $articulos = \DB::table('articulos')
        //     ->where('id_setarticulo',$setarticulos->id)
        //     ->get();

           

        // dd($articulos);

        return redirect('/setarticulos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SetArticulo $setarticulo)
    {
        return view('setarticulo.show', compact('setarticulo'));
    }

    public function barra(Request $request)
    {

        $setarticulos =SetArticulo::all();
        // dd($setarticulos);
        return view('setarticulo.barras')->with('setarticulos', $setarticulos);
    }
    public function createPDF()
    {


        $setarticulos = SetArticulo::all();

        view()->share('setarticulos', $setarticulos);

        return $pdf = PDF::loadView('setarticulo.barras', $setarticulos);

        //return $pdf->download('archivo-pdf.pdf');
    }
    public function impresion2()
    {
        $setarticulos = SetArticulo::all();
        return view('setarticulo.impresion')->with('setarticulos', $setarticulos);

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

        $setarticulos = SetArticulo::find($id);



        return view('setarticulo.edit')->with('setarticulos', $setarticulos);
    }
    public function editCart($id_setarticulo)
    {


        $articulos = SetArticulo::find($id_setarticulo)->articulos;
        //dd($articulos);
        // dd($request->id_setarticulo);
        $articulosTotal = Articulo::all();
        foreach ($articulos as $articulo) {
            \Cart::add(array(

                'id' => $articulo->id,
                'name' => $articulo->codigo,


                'price' => $articulo->estante,
                'quantity' => 1,
                'attributes' => array(),

            ));
        }



        return view('setarticulo.editcart', compact('articulosTotal', 'id_setarticulo'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //   ]);
        $setarticulo = SetArticulo::find($id);



        $setarticulo->sede = $request->get('sede');
        $setarticulo->piso = $request->get('piso');
        // $articulo->serial = $request->get('serial');
        $setarticulo->sector = $request->get('sector');
        $setarticulo->puesto = $request->get('puesto');

        $setarticulo->responsable = $request->get('responsable');

        $setarticulo->dni = $request->get('dni');
        $setarticulo->serial = $request->get('serial');



        $setarticulo->estado = $request->get('estado');
        
      
       

        $setarticulo->save();

       

       

       


        
        




        return redirect('/setarticulos')->with('actualizar', 'ok');
    }
    public function updateCart($id)
    {
        foreach (\Cart::getContent() as $articuloCarrito) {
            $articulo = Articulo::find($articuloCarrito->id);
            $articulo->update(['id_setarticulo' => $id ,'estado' => 'Deposito' ]);
        }





        return redirect('/setarticulos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setarticulo = SetArticulo::find( $id);

        $articulos = $setarticulo->articulos;
        foreach ($articulos as $articulo) {
           
            $articulo->update(['id_setarticulo' => null, 'estado' => 'Deposito']);
            $articulo->save();
        }
        $setarticulo->delete();

        return redirect('setarticulos')->with('eliminar', 'ok');
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

@extends('adminlte::page')

@section('title', 'DGHC')

@section('content_header')
    <h1> EDITAR ARTICULOS DEL  GABINETE</h1><br><br>

    <div class="col-sn-3">
    @if(count(Cart::getContent()))
    <table class="table table-striped">
     <thead>
         <th>ID</th>
         <th>CODIGO</th>
         {{-- <th>ESTANTE</th> --}}
     </thead>
     <tbody>
     @foreach (Cart::getContent() as $articulo)

     <tr>
         <td>{{$articulo->id}}</td>
         <td>{{$articulo->name}}</td>
         {{-- <td>{{$articulo->price}}</td> --}}
         <td>
           
                <form action="{{route('cart.removeitem')}}" method="post">
              @csrf
              <input type="hidden" name="id" value="{{$articulo->id}}">
              <button type="submit" class="btn btn-link btn-sm text-danger">DON'T ADD</button>
      
                
          
              </form> 

     </td>
     <td>
        @can('articulo.show')
                   <a href="{{route('articulos.show', $articulo->id)}}" class="btn btn-info"><i class="fas fa-info-circle"></i></a>
                   @endcan
                   @can('articulo.edit')
                   <a href="/articulos/{{$articulo->id}}/edit" class="btn btn-primary" ><i class="far fa-edit"></i></a>
                   @endcan
                {{-- {{dd($articulo->id)}} --}}
              {{-- <form action="{{route ('setarticulos.destroyArticuloSet', $articulo->id)}}" class="formulario-eliminar" method="POST">

                   @csrf

                  <!-- <a href="/articulos/{{$articulo->id}}/destroy" class="btn btn-danger"><i class="far fa-trash-alt"></i></a> -->
                  
                  @if ($articulo->id_setarticulo==null)
                  <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                  @endif
                  
                


                </form>   --}}


     </td>
      </tr>
      @endforeach
      </tbody>
      </table>
    @else
    <p class="badge badge-danger ">Gabinete Vacio</p>

         @endif
           @if (!count(Cart::getContent()))
          
         
         @endif  
         
       
        
             
        
    </div><br><br><br><br>



    <form action="/gabinetes/{{$id_gabinete}}/editcart" method="POST">
        @csrf

<a href="/gabinetes" class="btn btn-secondary" tabindex="4">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="5" >Guardar</button>
</form>




    <hr>



    

    <table id="articulos" class="table table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>

                <th scope="col">Categoria</th>

                <th scope="col">Marca/Modelo</th>
                <th scope="col">Serial</th>
                <th scope="col">Estante</th>
                {{-- <th scope="col">Faja</th>
                <th scope="col">Precinto</th>
                <th scope="col">Descripcion</th> --}}
                <th scope="col">Estado</th>
                <th scope="col">Fec/Creacion</th>
                <th scope="col">Fec/Actualizacion</th>
            
                <th scope="col">Acciones</th>

            </tr>

        </thead>
        <tbody>
            @foreach ($articulosTotal as $articulo)
            <tr>

                <td>{{$articulo->id}}</td>

                <td>{{$articulo->categoria->nombre}}</td>

                <td>{{$articulo->marca->nombre}}</td>
                <td>{{$articulo->serial}}</td>
                <td>{{$articulo->estante}}</td>
                {{-- <td>{{$articulo->faja}}</td>
                <td>{{$articulo->precinto}}</td>
                <td>{{$articulo->descripcion}}</td>  --}}
                <td>{{$articulo->estado}}</td>
                <td>{{$articulo->created_at}}</td>
                <td>{{$articulo->updated_at}}</td>



                <td>{{$articulo->categoria->nombre}}  {{$articulo->marca->nombre}}<br>{{$articulo->descripcion}}
                  {!! DNS1D::getBarcodeSVG($articulo->codigo,'C128C') !!}

                  <div >
                    <label>
                     >&nbsp;>&nbsp;>&nbsp;>&nbsp;&nbsp;>&nbsp;>&nbsp;>&nbsp;

                   @can('articulo.show')
                       <a href="{{route('articulos.show', $articulo->id)}}" class="btn btn-info"><i class="fas fa-info-circle"></i></a>
                       @endcan
                     
                  </label>
                  </div>
                  <form action="{{route('cart.add')}}" method="post">
                    @csrf
                    <input type="hidden" name="articulo_id" value="{{$articulo->id}}">
                   @if ($articulo->id_gabinete==null)
                   <input  id="caja "type="submit" name="btn" class="btn btn-success" value="ADD TO SET ARTICULO">
                   @endif 
                    
                   

                  </form>
                </td>
            </tr>
            @endforeach
          @foreach ( $articuloIds as $articulos)
          <td>ID {{$articulos}}</td>
       @endforeach

        </tbody>

    </table>


  









@stop


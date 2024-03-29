@extends('adminlte::page')

@section('title', 'DGHC')

@section('content_header')
    <h1> EDITAR ARTICULOS DEL  SET ARTICULO</h1><br><br>

    <div class="col-sn-3">
    @if(count(Cart::getContent()))
    <table class="table table-striped">
     <thead>
         <th>ID</th>
         <th>CODIGO</th>
     </thead>
     <tbody>
     @foreach (Cart::getContent() as $articulo)

     <tr>
         <td>{{$articulo->id}}</td>
         <td>{{$articulo->name}}</td>
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
                 
                   @if($articulo->attributes["tipo"] == "gabinete")
                   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Ver Artículos Del Gabinete {{ $articulo->id }}
                  </button>
                  
                  <!-- Modal -->
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Artículos del Gabinete</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                         
                          <ul>
                           
                             @foreach ($articuloss as $articulo) 
                               <li>  ID {{ $articulo->id}} - {{$articulo->categoria->nombre}} -  {{$articulo->marca->nombre}}</li> 

                             @endforeach  
                          </ul>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                    @endif
                   
                  
     </td>
      </tr>
      @endforeach
      </tbody>
      </table>
    @else
    <p class="badge badge-danger ">Set Articulo Vacio</p>

         @endif
           @if (!count(Cart::getContent()))
          
         {{'hola'}}
         @endif  
         
       
        
             
        
    </div><br><br><br><br>



    <form action="/setarticulos/{{$id_setarticulo}}/editcart" method="POST">
        @csrf

<a href="/setarticulos" class="btn btn-secondary" tabindex="4">Cancelar</a>
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
            <th scope="col">Estado</th>
            <th scope="col">Fec/Creacion</th>
            <th scope="col">Fec/Actualizacion</th>
            <th scope="col">Acciones</th>

        </tr>

    </thead>

    @foreach ($gabinetess as $gabinete)
    <tr>
    <td>{{$gabinete->id}}</td>
    <td>{{$gabinete->codigo}}</td>
    <td>{{$gabinete->estado}}</td>
    <td>{{$gabinete->created_at}}</td>
    <td>{{$gabinete->updated_at}}</td>
    
    <td>
       {!! DNS1D::getBarcodeSVG($gabinete->codigo,'C128C') !!} 
       
       <div >
           <label>
            >&nbsp;>&nbsp;>&nbsp;>&nbsp;&nbsp;>&nbsp;>&nbsp;>&nbsp;
            
          @can('articulo.show')
              <a href="{{route('articulos.show', $gabinete->id)}}" class="btn btn-info"><i class="fas fa-info-circle"></i></a>
              @endcan 
           
         </label> 
         </div>
       </div>
       <form action="{{route('cart.add2')}}" method="post">
         @csrf
         <input type="hidden" name="gabinete_id" value="{{$gabinete->id}}">
         
          @if ( $gabinete->estado == 'Deposito' || $gabinete->estado == 'Mantenimiento' || $gabinete->estado == 'Baja') 
         <input type="submit" name="btn" class="btn btn-success" value="ADD TO SET ARTICULO">
          @endif 
        
       </form>
    </tr>




    
    @endforeach














        <thead>
            <tr>
                <th scope="col">ID</th>

                <th scope="col">Categoria</th>

                <th scope="col">Marca/Modelo</th>
                <th scope="col">Serial</th>
                <th scope="col">Estante</th>
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
                   @if ($articulo->id_setarticulo==null && $articulo->id_gabinete == null)
                   <input  id="caja "type="submit" name="btn" class="btn btn-success" value="ADD TO SET ARTICULO">
                   @endif 
                    
                   

                  </form>
                </td>
            </tr>
            @endforeach
       

        </tbody>

    </table>


  









@stop


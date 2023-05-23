@extends('adminlte::page')

@section('title', 'DGHC')

@section('content_header')
    <h1>SET ARTICULO</h1><br><br>
    
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

     


     </td>
      </tr>
      @endforeach
      </tbody>
      </table>
    @else 
    <p class="badge badge-danger ">Set Articulo Vacio</p>
       
         @endif
    </div>
    

        <form action="/setarticulos" method="POST">
            @csrf
            {{-- <div class="mb-3">
                <label for="" class="form-label">Sede</label>
                <input id="sede" name="sede" type="text" class="form-control" tabindex="1">
                @error('sede')
                <div class="alert alert-danger">
                
                <small>*{{$message}}</small>
                
                </div>
                @enderror
            </div> --}}
            <div class="mb-3">
                <label for="" class="form-label">Sede</label>
                <input id="sede" name="sede" type="text" class="form-control" tabindex="3">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Piso</label>
                <input id="piso" name="piso" type="number" class="form-control" tabindex="2">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Sector</label>
                <input id="text" name="sector" type="text" class="form-control" tabindex="3">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Puesto</label>
                <input id="puesto" name="puesto" type="number" class="form-control" tabindex="3">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Responsable</label>
                <input id="responsable" name="responsable" type="text" class="form-control" tabindex="3">
            </div>
           
            <div class="mb-3">
                <label for="" class="form-label">IP</label>
                <input id="ip" name="ip" type="text" class="form-control" tabindex="3">
            </div>


            <div class="mb-3">
                <label for="" class="form-label">DNI</label>
                <input id="dni" name="dni" type="number" class="form-control" tabindex="3">
            </div>
            {{-- <div class="mb-3">
                <label for="" class="form-label">Serial</label>
                <input id="serial" name="serial" type="number" class="form-control" tabindex="3">
            </div> --}}
           
            <div class="mb-3">
                <label for="" class="form-label">Estado</label>
                
                <select id="estado" name="estado" type="text" class="form-control" tabindex="8">
        
                <option value="" selected="disabled">-- Seleccione un Estado --</option>
                
                <option value="Asignado" > Asignado </option>
                <option value="Deposito" > Deposito </option>
                <option value="Anulado" > Anulado </option>
                <option value="Transferencia" > Transferencia </option>
                <option value="Mantenimiento" > Mantenimiento </option>
                <option value="Baja" > Baja </option>
                </select>
        
                 @error('estado')
                <div class="alert alert-danger">
                
                <small>*{{$message}}</small>
                
                </div>
                @enderror
               
            </div>
            
            <a href="setarticulos" class="btn btn-secondary" tabindex="4">Cancelar</a>
            <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button>
            
            
        </form>
        
        







  
@stop


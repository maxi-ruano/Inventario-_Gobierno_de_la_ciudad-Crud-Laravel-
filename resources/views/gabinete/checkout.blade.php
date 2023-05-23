@extends('adminlte::page')

@section('title', 'DGHC')

@section('content_header')
    <h1>CPU</h1><br><br>
    
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
          <form action="{{route('cart.removeitem2')}}" method="post">
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
    <p class="badge badge-danger ">Gabinete Vacio</p>
       
         @endif
    </div>
    

        <form action="/gabinetes" method="POST">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Categoria</label>
                <select id="categoria_id" name="categoria_id" class="form-control" tabindex="1">
        
                    <option value="" selected="disabled">-- Seleccione una Categoria --</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                        
                    @endforeach          
                    
        
                </select>
                @error('categoria_id')
                <div class="alert alert-danger">
                
                <small>*{{$message}}</small>
                
                </div>
                @enderror             
            </div>      
            
            
            <div class="mb-3">
                <label for="" class="form-label">Marca/Modelo</label>
                <select id="marca_id" name="marca_id" class="form-control" tabindex="2">
                    <option value="" selected="disabled">-- Seleccione una Marca --</option>
                    @foreach ($marcas as $marca)
                        <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                        
                    @endforeach
                </select>
                @error('marca_id')
                <div class="alert alert-danger">
                
                <small>*{{$message}}</small>
                
                </div>
                @enderror
            </div>
        
            <div class="mb-3">
                <label for="" class="form-label">Serial</label>
                <input id="serial" name="serial" type="text" class="form-control" tabindex="3">
                
            </div>
        
            <div class="mb-3">
                <label for="" class="form-label">Estante</label>
                <input id="estante" name="estante" type="text" class="form-control" tabindex="4" >
                
            </div> 
        
            <div class="mb-3">
                <label for="" class="form-label">Faja</label>
                <input id="faja" name="faja" type="text" class="form-control" tabindex="5">
                @error('faja')
                <div class="alert alert-danger">
                
                <small>*{{$message}}</small>
                
                </div>
                @enderror
            </div>
        
            <div class="mb-3">
                <label for="" class="form-label">Precinto</label>
                <input id="precinto" name="precinto" type="text" class="form-control" tabindex="6">
                @error('precinto')
                <div class="alert alert-danger">
                
                <small>*{{$message}}</small>
                
                </div>
                @enderror
            </div>
        
            <div class="mb-3">
                <label for="" class="form-label">Descripcion</label>
                <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="7">
            </div>
           
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
            
            <a href="gabinetes" class="btn btn-secondary" tabindex="4">Cancelar</a>
            <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button>
            
            
        </form>
        
        







  
@stop


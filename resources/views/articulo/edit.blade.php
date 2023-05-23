|@extends('adminlte::page')

@section('title', 'DGHC')

@section('content_header')
    <h1>EDITAR ARTICULO</h1>
@stop

@section('content')
    <form action="/articulos/{{$articulo->id}}" class="formulario-actualizar" method="POST">
    @csrf
    @method('PUT')
    
    

    <div class="mb-3">
        <label for="" class="form-label">Categoria</label>
        <select id="categoria_id" name="categoria_id" value="{{old('categoria_id') ?? $articulo->idcategoria}}" class="form-control" tabindex="1">
            <option value="" selected="disabled">-- Seleccione una Categoria --</option>
            @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}" @if ($categoria->id === $articulo->categoria_id) selected @endif>{{$categoria->nombre}}</option>

            @endforeach
        </select>
    </div>
    
    <div class="mb-3">
        <label for="" class="form-label">Marca/Modelo</label>
        <select id="idmarca" name="marca_id" class="form-control" tabindex="2">
            <option value="" selected="disabled">-- Seleccione una Marca --</option>
            @foreach ($marcas as $marca)
                <option value="{{$marca->id}}" @if ($marca->id === $articulo->marca_id) selected @endif>{{$marca->nombre}}</option>
            @endforeach
        </select>
    </div>

     <div class="mb-3">
        <label for="" class="form-label">Serial</label>
        <input id="serial" name="serial" type="text" class="form-control" tabindex="3" value="{{$articulo->serial}}">
        @error('serial')
        <div class="alert alert-danger">
        
        <small>*{{$message}}</small>
        
        </div>
        @enderror
    </div> 
    <div class="mb-3">
        <label for="" class="form-label">Estante</label>
        <input id="estante" name="estante" type="text" class="form-control" tabindex="4" value="{{$articulo->estante}}">
       
    </div>
   

   
    <div class="mb-3">
        <label for="" class="form-label">Estado</label>
        <select id="estado" name="estado" value="{{old('estado') ?? $articulo->estado}}" type="text" class="form-control" tabindex="8" >

        

        <option value="" selected="disabled">-- Seleccione un Estado --</option>
        
        <option value="{{$articulo->estado}}" @if ($articulo->estado === $articulo->estado) selected @endif>{{$articulo->estado}}</option>
       
        
         {{-- <option value="Asignado" > Asignado </option> --}}
        <option value="Deposito" > Deposito </option> 
        {{-- <option value="Traslado" > Traslado </option> --}}
        <option value="Fuera de Servicio" > Fuera de Servicio </option>
        <option value="Mantenimiento" > Mantenimiento </option>
        {{-- <option value="Baja" > Baja </option> --}}

        
        </select>
       

    </div>

    <a href="/articulos" class="btn btn-secondary" tabindex="9">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="10">Guardar</button>
    
</form>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin_custom.css')}}">
@stop

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    
@if (session('actualizar') == 'ok')
    <script>
       Swal.fire(
      '¡Actualizado!',
      'El registro se actualizo con exito.',
      'success'
    ) 
    </script>

@endif

<script>
     $('.formulario-actualizar').submit(function(e){
        e.preventDefault();

        Swal.fire({
  title: '¿Estas seguro?',
  text: "¡Este registro se actualizara definitivamente!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: '¡Si, actualizar!',
  cancelButtonText: 'Cancelar',
}).then((result) => {
  if (result.isConfirmed) {
    
    this.submit();
  }
})
     });

</script>
@stop
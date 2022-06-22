@extends('adminlte::page')

@section('title', 'DGHC')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-primary">
            <div class="card-title"><h2>Activos</h2></div><br>
            <p class="card-category"><h4>Vista detallada del activo {{$setarticulo->sede}}</h4></p>
          </div>
          <!--body-->
          <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success" role="success">
              {{ session('success') }}
            </div>
            @endif
            <div class="row">
              
              <!--comienzo segunda opcion de detalles de articulos -->
              <div class="col-md-12">
                <div class="card card-user">
                  <div class="card-body">
                    <a href="#">
                     <center><img src="{{ asset('/img/hard.png') }}" alt="image" height="150" class="avatar"> </center>
                
                    </a><br>
                    <table class="table table-bordered table-striped"><center>
                      <tbody>
                        <tr>
                          <th>ID</th>
                          <td><center>{{ $setarticulo->id }}</center></td>
                        </tr>
                        <tr>
                          <th>Codigo</th>
                          <td><center>{{ $setarticulo->codigo }}</center></td>
                        </tr>
                        <tr>
                          <th>Sede</th>
                          <td><center>{{ $setarticulo->sede }}</center></td>
                        </tr>
                        
                        <tr>
                          <th>Sector</th>
                          <td><center>{{ $setarticulo->sector }}</center></td>
                        </tr>
                        <tr>
                          <th>Puesto</th>
                          <td><center>{{ $setarticulo->puesto }}</center></td>
                        </tr>
                        <tr>
                         
                        
                       

                        <tr> 
                        <th>Codigo de Barras</th>                      
                          <td><center>{{$setarticulo->sede}} ,{{$setarticulo->sector}}<br>{{$setarticulo->puesto}} <br>

                      {!! DNS1D::getBarcodeSVG($setarticulo->codigo,'C128C') !!}</center></td>
                       </tr>

                      </tbody>
                </table>
                    
                  </div>
                  <div class="card-footer bg-dark">
                    <div class="button-container">
                      <a href="{{ route('setarticulos.index') }}" class="btn btn-sm btn-success mr-3"> Volver </a>
                      @can('articulo.edit')
                      <a href="{{ route('setarticulos.edit', $setarticulo->id)}}" class="btn btn-sm btn-primary">
                       Editar Info </a>
                      @endcan
                    </div>
                  </div>
                </div>
              </div>
              <!--fin segunda opcion de detalles de articulos -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection



@section('css')
<link rel="stylesheet" href="{{asset('css/admin_custom.css')}}">
@stop

@section('js')

@stop
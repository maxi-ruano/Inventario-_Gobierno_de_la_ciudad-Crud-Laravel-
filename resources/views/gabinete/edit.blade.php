|@extends('adminlte::page')

@section('title', 'DGHC')

@section('content_header')
    <h1>EDITAR INFO DEL GABINETE</h1>
@stop

@section('content')

<form action="/gabinetes/{{$gabinetes->id}}"  method="POST">
     @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Serial</label>
        <input id="serial" name="serial" type="text" class="form-control" tabindex="1" value="{{$gabinetes->serial}}">
        @error('nombre')
        <div class="alert alert-danger">
        
        <small>*{{$message}}</small>
        
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Estante</label>
        <input id="estante" name="estante" type="text" class="form-control" tabindex="1" value="{{$gabinetes->estante}}">
        @error('nombre')
        <div class="alert alert-danger">
        
        <small>*{{$message}}</small>
        
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Faja</label>
        <input id="faja" name="faja" type="text" class="form-control" tabindex="1" value="{{$gabinetes->faja}}">
        @error('nombre')
        <div class="alert alert-danger">
        
        <small>*{{$message}}</small>
        
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Precinto</label>
        <input id="precinto" name="precinto" type="text" class="form-control" tabindex="1" value="{{$gabinetes->precinto}}">
        @error('nombre')
        <div class="alert alert-danger">
        
        <small>*{{$message}}</small>
        
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descripcion</label>
        <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="1" value="{{$gabinetes->descripcion}}">
        @error('nombre')
        <div class="alert alert-danger">
        
        <small>*{{$message}}</small>
        
        </div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="" class="form-label">Estado</label>
        
        <select id="estado" name="estado" type="text" class="form-control" tabindex="8" value="{{$gabinetes->estado}}">

        <option value="{{$gabinetes->estado}}" selected="disabled">{{$gabinetes->estado}}</option>
        
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

    
    <a href="/gabinetes" class="btn btn-secondary" tabindex="4">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button> 
    
</form>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin_custom.css')}}">
@stop

@section('js')
@stop

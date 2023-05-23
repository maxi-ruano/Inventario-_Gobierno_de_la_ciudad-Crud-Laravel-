|@extends('adminlte::page')

@section('title', 'DGHC')

@section('content_header')
    <h1>EDITAR INFO SET ARTICULO</h1>
@stop

@section('content')

<form action="/setarticulos/{{$setarticulos->id}}"  method="POST">
     @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Sede</label>
        <input id="sede" name="sede" type="text" class="form-control" tabindex="1" value="{{$setarticulos->sede}}">
        @error('nombre')
        <div class="alert alert-danger">
        
        <small>*{{$message}}</small>
        
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Piso</label>
        <input id="piso" name="piso" type="text" class="form-control" tabindex="1" value="{{$setarticulos->piso}}">
        @error('nombre')
        <div class="alert alert-danger">
        
        <small>*{{$message}}</small>
        
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Sector</label>
        <input id="sector" name="sector" type="text" class="form-control" tabindex="1" value="{{$setarticulos->puesto}}">
        @error('nombre')
        <div class="alert alert-danger">
        
        <small>*{{$message}}</small>
        
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Puesto</label>
        <input id="puesto" name="puesto" type="text" class="form-control" tabindex="1" value="{{$setarticulos->puesto}}">
        @error('nombre')
        <div class="alert alert-danger">
        
        <small>*{{$message}}</small>
        
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">IP</label>
        <input id="ip" name="ip" type="text" class="form-control" tabindex="1" value="{{$setarticulos->ip}}">
        @error('nombre')
        <div class="alert alert-danger">
        
        <small>*{{$message}}</small>
        
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Responsable</label>
        <input id="responsable" name="responsable" type="text" class="form-control" tabindex="1" value="{{$setarticulos->responsable}}">
        @error('nombre')
        <div class="alert alert-danger">
        
        <small>*{{$message}}</small>
        
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Dni</label>
        <input id="dni" name="dni" type="text" class="form-control" tabindex="1" value="{{$setarticulos->dni}}">
        @error('nombre')
        <div class="alert alert-danger">
        
        <small>*{{$message}}</small>
        
        </div>
        @enderror
    </div>
</div>
<div class="mb-3">
    <label for="" class="form-label">Serial</label>
    <input id="serial" name="serial" type="text" class="form-control" tabindex="1" value="{{$setarticulos->serial}}">
    @error('nombre')
    <div class="alert alert-danger">
    
    <small>*{{$message}}</small>
    
    </div>
    @enderror 
</div>
    <div class="mb-3">
        <label for="" class="form-label">Estado</label>
        
        <select id="estado" name="estado" type="text" class="form-control" tabindex="8" value="{{$setarticulos->estado}}">

        <option value="{{$setarticulos->estado}}" selected="disabled">{{$setarticulos->estado}}</option>
        
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

    
    <a href="/setarticulos" class="btn btn-secondary" tabindex="4">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button> 
    
</form>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin_custom.css')}}">
@stop

@section('js')
@stop

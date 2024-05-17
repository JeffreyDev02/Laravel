@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <h3>Nueva Articulo</h3>
            @if(count($errors)> 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors -> all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
    <div class="row">
        {!! Form::open(array('url'=> 'almacen/articulo', 'method' => 'POST', 'autocomplete' => 'off', 'files' => true )) !!}
        {{Form::token()}}
        <div class="col-lg-6 col-md-6 col-ms-12">
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label for="codigo" class="form-label">Codigo</label>
                <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Codigo">
            </div>
            <div class="form-group">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="stock" id="stock" class="form-control" placeholder="Stock">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-ms-12">
            <div class="form-group">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="descripcion">
            </div>
            <div class="form-group">
                <label for="idcategoria" class="form-label">Id Categoria</label>
                <br>
                <select class="form-select" aria-label="Default select example" name="idcategoria" id="idcategoria">
                    <option value="" selected disabled>--Eliga una opción</option>    
                    @foreach($categorias as $cat)
                    <option value="{{$cat -> idcategoria}}">{{$cat -> idcategoria}} - {{$cat -> nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" name="imagen"  class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
            
            
            
            
            
        
@endsection
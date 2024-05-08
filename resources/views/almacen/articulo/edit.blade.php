@extends('layouts.admin')
@section('contenido')

<div class="row">
    <div class="col-lg-6 col-md-6 col-ms-12">
        <h3>Editar Articulo</h3>
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
            @foreach($errors -> all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
        @endif

        {!! Form::model($articulo, ['method'=> 'PATCH', 'route'=> ['articulo.update', $articulo -> idarticulo]]) !!}
        {!! Form::token() !!}
        <div class="form-group">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" value="{{$articulo -> nombre}}">
        </div>
        <div class="form-group">
            <label for="codigo" class="form-label">Codigo</label>
            <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Codigo" value="{{$articulo -> codigo}}">
        </div>
        <div class="form-group">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" name="stock" id="stock" class="form-control" placeholder="Stock" value="{{$articulo -> stock}}">
        </div>
        <div class="form-group">
            <label for="descripcion" class="form-label">Descripcion</label>
            <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="descripcion" value="{{$articulo -> descripcion}}">
        </div>
        <div class="form-group">
            <label for="idcategoria" class="form-label">Id Categoria</label>
            <br>
            <select class="form-select" aria-label="Default select example" name="idcategoria" id="idcategoria">
                @foreach($categorias as $cat)
                    @if(($articulo -> idcategoria) == ($cat -> idcategoria))
                        <option value="{{$cat -> idcategoria}}" selected>{{$cat -> idcategoria}} - {{$cat -> nombre}}</option>
                    @else
                        <option value="{{$cat -> idcategoria}}">{{$cat -> idcategoria}} - {{$cat -> nombre}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection
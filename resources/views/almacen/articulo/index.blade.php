@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-ms-8 col-xs-12">
        <h3>Listado de Articulos <a href="articulo/create"><button class="btn btn-success">Nuevo</button></a></h3> 
        @include('almacen.articulo.search')
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="table-resposive">
            <table class="table table-striped table bordered table-condesed table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>IdCategoria</th>
                        <th>codigo</th>
                        <th>Nombre</th>
                        <th>Stock</th>
                        <th>Descripcion</th>
                        <th>Imagen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articulos as $art)
                    <tr>
                        <th>{{$art -> idarticulo}}</th>
                        <td>{{$art -> categoriaNombre}}</td>
                        <td>{{$art -> codigo}}</td>
                        <td>{{$art -> nombre}}</td>
                        <td>{{$art -> stock}}</td>
                        <td>{{$art -> descripcion}}</td>
                        <td>
                            <a href="{{ route('articulo.edit', $art-> idarticulo) }}"><button class="btn btn-info">Editar</button></a>
                            <a href="" data-target="#modal-delete-{{$art-> idarticulo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('almacen.articulo.modal')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
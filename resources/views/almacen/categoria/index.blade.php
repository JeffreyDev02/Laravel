@extends('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-ms-8 col-xs-12">
			<a href="{{route('descarga-pdf')}}" class="btn btn-warning">Generar pdf</a>
		</div>
		<div class="col-lg-8 col-md-8 col-ms-8 col-xs-12">
			<h3>Listado de Categoria <a href="categoria/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('almacen.categoria.search')
		</div>
	</div>

	<div class="row">
		<class class="col-lg-12 col-md-12">
			<div class="table-resposive">
				<table class="table table-striped table bordered table-condesed table hover">
					<thead>
						<tr>
							<th>Id</th>
							<th>Nombre</th>
							<th>Descripcion</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach($categorias as $cat)
						<tr>
							<td>{{$cat-> idcategoria}}</td>
							<td>{{$cat -> nombre}}</td>
							<td>{{$cat -> descripcion}}</td>
							<td>
								<a href="{{ route('categoria.edit', $cat->idcategoria) }}"><button class="btn btn-info">Editar</button></a>
								<a href="" data-target="#modal-delete-{{$cat->idcategoria}}" data-toggle="modal" ><button class="btn btn-danger">Eliminar</button></a>
							</td>
						</tr>
						@include ('almacen.categoria.modal')
						@endforeach
					</tbody>
				</table>
			</div>
			{{$categorias -> render()}}
		</class>
	</div>
@endsection

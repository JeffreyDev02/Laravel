@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-ms-8 col-xs-12">
        <h3>Listado de ingresos <a href="ingreso/create"><button class="btn btn-success">Nuevo</button></a></h3>
        @include('almacen.compras.ingreso.search')
    </div>
</div>

<div class="row">
		<class class="col-lg-12 col-md-12">
			<div class="table-resposive">
				<table class="table table-striped table bordered table-condesed table hover">
					<thead>
						<tr>
							<th>Id</th>
							<th>Fecha</th>
							<th>Proveedor</th>
							<th>Comprobante</th>
                            <th>Impuesto</th>
                            <th>Total</th>
                            <th>Estado</th>
                            <th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach($ingresos as $ing)
						<tr>
							<th>{{$ing -> idingreso}}</th>
                            <th>{{$ing -> fecha_hora}}</th>
							<td>{{$ing -> nombre}}</td>
							<td>{{$ing -> tipo_comprobante}} - {{$ing -> serie_comprobante}} - {{$ing -> num_comprobante}}</td>
							<td>{{$ing -> impuesto}}</td>
							<td>{{$ing -> total}}</td>
                            <td>{{$ing -> estado}}</td>
							<td>
								<a href="{{route('ingreso.show', $ing -> idingreso)}}"><button class="btn btn-info">Detalles</button></a>
								<a href="" data-target="#modal-delete-{{$ing->idingreso}}" data-toggle="modal" ><button class="btn btn-danger">Anular</button></a>
							</td>
						</tr>
						@include('almacen.compras.ingreso.modal')
						@endforeach
					</tbody>
				</table>
			</div>
			
		</class>
	</div>
@endsection

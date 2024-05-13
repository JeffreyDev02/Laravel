@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-ms-8 col-xs-12">
        <h3>Listado de Persona <a href=""><button class="btn btn-success">Nuevo</button></a></h3>
        
    </div>
</div>

<div class="row">
		<class class="col-lg-12 col-md-12">
			<div class="table-resposive">
				<table class="table table-striped table bordered table-condesed table hover">
					<thead>
						<tr>
							<th>Id</th>
							<th>Tipo Persona</th>
							<th>Nombre</th>
							<th>Tipo Documento</th>
                            <th>Num. Documento</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach($personas as $persona)
						<tr>
							<th>{{$persona -> idpersona}}</th>
                            <th>{{$persona -> tipo_persona}}</th>
							<td>{{$persona -> nombre}}</td>
							<td>{{$persona -> tipo_documento}}</td>
                            <td>{{$persona -> num_document}}</td>
							<td>{{$persona -> direccion}}</td>
							<td>{{$persona -> telefono}}</td>
                            <td>{{$persona -> email}}</td>
							<td>
								<a href=""><button class="btn btn-info">Editar</button></a>
								<a href=""><button class="btn btn-danger">Eliminar</button></a>
							</td>
						</tr>
						
						@endforeach
					</tbody>
				</table>
			</div>
			
		</class>
	</div>
@endsection

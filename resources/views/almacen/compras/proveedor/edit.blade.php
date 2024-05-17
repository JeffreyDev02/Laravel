@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div>
                <h3>Nuevo Cliente</h3>
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors -> all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
    
                {!! Form::model($personas, ['method' => 'PATCH', 'route' => ['persona.update', $personas -> idpersona]] ) !!}
                {{Form::token()}}
    
                    <div class="form-group">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" value="{{$personas-> nombre}}">
                    </div>
        
                    <div class="form-group">
                        <label for="documento" class="form-label">Tipo Documento</label>
                        <select class="form-select"  name="tipo_documento" id="documento">
                            <option value="dpi" <?php echo ($personas -> tipo_documento == 'dpi') ? 'selected' : '';?>  >DPI</option>
                            <option value="pasaporte" <?php echo ($personas-> tipo_documento == 'pasaporte')? 'selected': '' ?> >Pasaporte</option>
                        </select>
                    </div>
        
                    <div class="form-group">
                        <label for="num_documento" class="form-label">Numero Documento</label>
                        <input type="number" name="num_documento" id="num_documento" class="form-control" placeholder="Numero Documento" value="{{$personas -> num_documento}}" min="0" step="1"> 
                    </div>

                    <div class="form-group">
                        <label for="direccion" class="form-label">Direccion</label>
                        <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Direccion" value="{{$personas -> direccion}}">
                    </div>

                    <div class="form-group">
                        <label for="telefono" class="form-label">Telefono</label>
                        <input type="tel" name="telefono" id="telefono" class="form-control" placeholder="Telefono" value="{{$personas -> telefono}}">
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Correo Electronico" value="{{$personas -> email}}">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="reset" class="btn btn-warning">Cancelar</button>
                    </div>
    
                {!! Form::close() !!}
    
            </div>
        </div>
    </div>
@endsection
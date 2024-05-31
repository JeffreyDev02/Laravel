@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div>
                <h3>Nuevo Ingreso</h3>
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors -> all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
    
                {!! Form::open(array('url' => 'almacen/ingreso', 'method'=>'POST', 'autocomplete'=> 'off')) !!}
                {{Form::token()}}
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="proveedor" class="form-label">Proveedor</label>
                            <select name="proveedor" id="idproveedor" class="form-select">
                                @foreach($personas as $persona)
                                    <option value="{{$persona -> idpersona}}">{{$persona -> nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label for="comprobante" class="form-label">Tipo Comprobante</label>
                            <select name="tipo_comprobante" class="form-select">
                                <option value="Boleta">Boleta</option>
                                <option value="Factura">Factura</option>
                                <option value="Ticket">Ticket</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label for="serie_comprobante" class="form-labwl">Serie Comprobante</label>
                            <input type="text" name="serie_comprobante" value="{{old('serie_comprobante')}}" class="form-control" placeholder="Serie Comprobante..">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group">
                            <label for="num_comprobante" class="form-labwl">Numero Comprobante</label>
                            <input type="text" name="num_comprobante" required value="{{old('num_comprobante')}}" class="form-control" placeholder="Numero Comprobante..">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="p-35 mb-4 bg-body-tertiary rounded-3">

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                            <button class="btn btn-danger" type="reset">Cancel</button>
                        </div>
                    </div>
                </div>
                   
                {!! Form::close() !!}
    
            </div>
        </div>
    </div>
@endsection
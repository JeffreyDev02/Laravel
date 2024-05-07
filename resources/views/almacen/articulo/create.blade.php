@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <h3>Nueva Categoria</h3>
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

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <select class="form-select" aria-label="Default select example">
                    @foreach($categorias as $cat)
                        <option value="{{$cat -> idcategoria}}">{{$cat -> idcategoria}} - {{$cat -> nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        

    </div>
@endsection
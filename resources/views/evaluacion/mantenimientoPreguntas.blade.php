@extends('layouts.app')

@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/teachertest/mantenimiento.js') }}" defer></script>
    <script src="{{ asset('js/teachertest/mantPreguntas.js') }}" defer></script>
    {{--<main role="main">--}}
    <script type="text/javascript">
        $(document).ready(function () {
            $('.modal').modal('show')
        });
    </script>

    <div class="container">

        <div class="row">
            <div class="card col-md-6">
                    {{--@if(session('hash'))--}}
                    {{--<div class="modal" tabindex="-1" role="dialog">--}}
                        {{--<div class="modal-dialog" role="document">--}}
                            {{--<div class="modal-content">--}}
                                {{--<div class="modal-header">--}}
                                    {{--<h5 class="modal-title">Modal title</h5>--}}
                                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                                        {{--<span aria-hidden="true">&times;</span>--}}
                                    {{--</button>--}}
                                {{--</div>--}}
                                {{--<div class="modal-body">--}}
                                    {{--<p>Modal body text goes here.</p>--}}
                                {{--</div>--}}
                                {{--<div class="modal-footer">--}}
                                    {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--@endif--}}
                <div class="card-header background-card-color">
                    Carga Masiva Carrera, Curso, Profesor, Alumnos asignados
                </div>
                <div class="card-body">
                    @if(session('message'))
                        <div class="alert alert-danger" role="alert">
                            {{session('message')}}
                        </div>
                    @endif
                    <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importArchivoFinal') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="file" name="import_file" />
                        <button class="btn btn-primary">Cargar Archivo</button>
                    </form>
                    {{--<a href="{{ URL::to('downloadExcel/xls') }}"><button class="btn btn-success">Descargar Excel xls</button></a>--}}
                    {{--<a href="{{ URL::to('downloadExcel/xlsx') }}"><button class="btn btn-success">Descargar Excel xlsx</button></a>--}}
                    {{--<a href="{{ URL::to('downloadExcel/csv') }}"><button class="btn btn-success">Descargar CSV</button></a>--}}
                </div>
            </div>
            <div class="card col-md-6">
                <div class="card-header background-card-color">
                    Cargar preguntas
                </div>
                <div class="card-body">
                    <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importaPreguntas') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="file" name="import_file" />
                        <button class="btn btn-primary">Cargar Archivo</button>
                    </form>
                    <form method="get" action="{{ URL::to('deletePreguntas') }}">
                        <button class="btn btn-danger">Eliminar Preguntas</button>
                    </form>

                    {{--<a href="{{ URL::to('downloadExcel/xls') }}"><button class="btn btn-success">Descargar Excel xls</button></a>--}}
                    {{--<a href="{{ URL::to('downloadExcel/xlsx') }}"><button class="btn btn-success">Descargar Excel xlsx</button></a>--}}
                    {{--<a href="{{ URL::to('downloadExcel/csv') }}"><button class="btn btn-success">Descargar CSV</button></a>--}}
                </div>
            </div>
            <br>
            {{--<div class="card col-md-6">--}}
                {{--<div class="card-header background-card-color">--}}
                    {{--Generar Preguntas--}}
                {{--</div>--}}
                {{--<div class="card-body">--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="formGroupExampleInput">Ingrese pregunta</label>--}}
                        {{--<input type="text" class="form-control" id="pPregunta" placeholder="Ingrese pregunta">--}}
                    {{--</div>--}}
                    {{--<div class="custom-control custom-checkbox">--}}
                        {{--<input type="checkbox" class="custom-control-input" id="customCheck1">--}}
                        {{--<label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="formGroupExampleInput">Pregunta Radio</label>--}}
                        {{--<div class="custom-control custom-radio">--}}
                            {{--<input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">--}}
                            {{--<label class="custom-control-label" for="customRadio1">Toggle this custom radio</label>--}}
                        {{--</div>--}}
                        {{--<div class="custom-control custom-radio">--}}
                            {{--<input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">--}}
                            {{--<label class="custom-control-label" for="customRadio2">Or toggle this other custom radio</label>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="form-group">--}}
                            {{--<label for="formGroupExampleInput">Tipo componente</label>--}}
                            {{--<select class="custom-select mr-sm-2" id="tipoDePregunta">--}}
                                {{--<option selected>Opción</option>--}}
                                {{--<option value="1">1. Pregunta abierta</option>--}}
                                {{--<option value="2">2. Selección multiple</option>--}}
                                {{--<option value="3">3. Radio</option>--}}
                                {{--<option value="3">Three</option>--}}
                            {{--</select>--}}
                    {{--</div>--}}
                    {{--<button type="button" id="generaPregunta" class="btn btn-primary">Primary</button>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="card col-md-6">--}}
                {{--<div class="card-header background-card-color">--}}
                    {{--Formulario Generado--}}
                {{--</div>--}}
                {{--<div class="card-body">--}}
                    {{--<div id="printForm"></div>--}}
                {{--</div>--}}
            {{--</div>--}}


            <br>

            <div class="card col-md-12">
                <div class="card-header">
                    Preguntas   <a href="llenar" target="_blank">URL</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">ID Pregunta</th>
                            <th scope="col">Preguta</th>
                            <th scope="col">Tipo componente</th>
                            <th scope="col">Opciones</th>
                            {{--<th scope="col">Acciones</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data['preguntas'] as $u)
                            <tr>
                                <td scope="row">{{ $u->ID }}</td>
                                <td scope="row">{{ $u->PREGUNTA }}</td>
                                <td scope="row">{{ $u->TIPO_COMPONENTE }}</td>
                                <td scope="row">{{ $u->OPCION1 }}<br>{{ $u->OPCION2 }}<br>{{ $u->OPCION3 }}<br>{{ $u->OPCION4 }}</td>
                                {{--<td>--}}
                                    {{--<a onClick="editarUsuario({{ $u->id }})" class="btn btn-success">--}}
                                        {{--Editar--}}
                                    {{--</a>--}}
                                    {{--<a onClick="eliminarUsuario({{ $u->id }})" class="btn btn-danger">--}}
                                        {{--Eliminar--}}
                                    {{--</a>--}}
                                {{--</td>--}}
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card col-md-12">
                <div class="card-header">
                    Catedrático
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Código carrera</th>
                            <th scope="col">Nombre carrera</th>
                            <th scope="col">Código curso</th>
                            <th scope="col">Nombre curso</th>
                            <th scope="col">Código catedratico</th>
                            <th scope="col">Nombre catedratico</th>
                            {{--<th scope="col">Opciones</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($data['profesores']))
                            @foreach($data['profesores'] as $u)
                                <tr>
                                    <td scope="row">{{ $u->CODIGO_CARRERA }}</td>
                                    <td scope="row">{{ $u->NOMBRE_CARRERA }}</td>
                                    <td scope="row">{{ $u->CODIGO_CURSO }}</td>
                                    <td scope="row">{{ $u->NOMBRE_CURSO }}</td>
                                    <td scope="row">{{ $u->CODIGO_CATEDRATICO }}</td>
                                    <td scope="row">{{ $u->NOMBRE_CATEDRATICO }}</td>
                                    {{--<td>--}}
                                        {{--<a href="{{ URL::to('llenar/'.$u->CODIGO_CURSO.'/'.$u->CODIGO_CATEDRATICO) }}" target="_blank" class="btn btn-success">--}}
                                            {{--Generar Formulario--}}
                                        {{--</a>--}}
                                        {{--<a onClick="eliminarUsuario({{ $u->id }})" class="btn btn-danger">--}}
                                            {{--Eliminar--}}
                                        {{--</a>--}}
                                    {{--</td>--}}
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>

@endsection
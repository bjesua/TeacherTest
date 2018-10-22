@extends('layouts.app')

@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/teachertest/mantenimiento.js') }}" defer></script>
    {{--<main role="main">--}}
    <script type="text/javascript">
        $(document).ready(function () {

        });
    </script>

    <div class="container">

        <div class="row">
            <div class="card col-md-6">
                <div class="card-header background-card-color">
                    Cargar Preguntas
                </div>
                <div class="card-body">
                    <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importoQuestions') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
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
                    Asignar Preguntas a profesores
                </div>
                <div class="card-body">
                    <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importoAsignaQuestions') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="file" name="import_file" />
                        <button class="btn btn-primary">Cargar Archivo</button>
                    </form>
                    {{--<a href="{{ URL::to('downloadExcel/xls') }}"><button class="btn btn-success">Descargar Excel xls</button></a>--}}
                    {{--<a href="{{ URL::to('downloadExcel/xlsx') }}"><button class="btn btn-success">Descargar Excel xlsx</button></a>--}}
                    {{--<a href="{{ URL::to('downloadExcel/csv') }}"><button class="btn btn-success">Descargar CSV</button></a>--}}
                </div>
            </div>
            <br>
            <div class="card col-md-6">
                <div class="card-header background-card-color">
                    Preguntas
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Pregunta</label>
                        <input type="text" class="form-control" id="pPregunta" placeholder="Ingrese pregunta">
                    </div>
                    <div class="form-group">
                            <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Tipo Componente</label>
                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                <option selected>Choose...</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Cuestionario</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                    </div>
                </div>
            </div>

            <div class="card col-md-6">
                <div class="card-header background-card-color">
                    Asignar Preguntas
                </div>
                <div class="card-body">

                </div>
            </div>


            <br>

            <div class="card col-md-12">
                <div class="card-header">
                    Preguntas
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">ID Pregunta</th>
                            <th scope="col">Preguta</th>
                            <th scope="col">Tipo componente</th>
                            <th scope="col">No. Cuestionario</th>
                            <th scope="col">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data['usuarios'] as $u)
                            <tr>
                                <td scope="row">{{ $u->ID }}</td>
                                <td scope="row">{{ $u->PREGUNTA }}</td>
                                <td scope="row">{{ $u->TIPO_COMPONENTE }}</td>
                                <td scope="row">{{ $u->CUESTIONARIO }}</td>
                                <td>
                                    <a onClick="editarUsuario({{ $u->id }})" class="btn btn-success">
                                        Editar
                                    </a>
                                    <a onClick="eliminarUsuario({{ $u->id }})" class="btn btn-danger">
                                        Eliminar
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card col-md-12">
                <div class="card-header">
                    Preguntas
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">ID cuestionario</th>
                            <th scope="col">Código catedratico</th>
                            <th scope="col">Fecha inicio</th>
                            <th scope="col">Fecha fin</th>
                            <th scope="col">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data['asignaPreguntas'] as $u)
                            <tr>
                                <td scope="row">{{ $u->CUESTIONARIO }}</td>
                                <td scope="row">{{ $u->CODIGO_CATEDRATICO }}</td>
                                <td scope="row">{{ $u->FECHA_INICIO }}</td>
                                <td scope="row">{{ $u->FECHA_FIN }}</td>
                                <td>
                                    <a onClick="editarUsuario({{ $u->id }})" class="btn btn-success">
                                        Editar
                                    </a>
                                    <a onClick="eliminarUsuario({{ $u->id }})" class="btn btn-danger">
                                        Eliminar
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>

@endsection
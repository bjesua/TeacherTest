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
                    <a href="{{ URL::to('downloadExcel/xls') }}"><button class="btn btn-success">Descargar Excel xls</button></a>
                    <a href="{{ URL::to('downloadExcel/xlsx') }}"><button class="btn btn-success">Descargar Excel xlsx</button></a>
                    <a href="{{ URL::to('downloadExcel/csv') }}"><button class="btn btn-success">Descargar CSV</button></a>
                </div>
            </div>
        </div>

    </div>

@endsection
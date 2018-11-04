@extends('layouts.app')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/teachertest/llenar.js') }}" defer></script>

    <div class="container">
        <?php
        $llenar = 1;
        if (isset($data['calificar'])) {
            $llenar = 0;
        }
        ?>

        @if($llenar == 1)
            <div class=" row col-md-12">
                <h3 class="text-center col-md-12">Ingrese carnet</h3>
                <form action="{{ URL::to('registrarCarnet') }}" class="offset-3 col-md-12 form-horizontal" method="get"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-label-group col-md-6">
                        <input type="text" id="inputEmail" class="form-control" name="noCarnet" required=""
                               autofocus="">
                    </div>
                    <button class="btn btn-lg btn-primary col-md-6 btn-block" type="submit">Ingresar</button>
                </form>
            </div>
        @endif

        @if(isset($data['cursos']))
            <div class="card col-md-12">
                <div class="card-header">
                    Cursos Asignados
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
                            <th scope="col">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data['cursos'] as $u)
                            <tr>
                                <td scope="row">{{ $u->CODIGO_CARRERA }}</td>
                                <td scope="row">{{ $u->NOMBRE_CARRERA }}</td>
                                <td scope="row">{{ $u->CODIGO_CURSO }}</td>
                                <td scope="row">{{ $u->NOMBRE_CURSO }}</td>
                                <td scope="row">{{ $u->CODIGO_CATEDRATICO }}</td>
                                <td scope="row">{{ $u->NOMBRE_CATEDRATICO }}</td>
                                <td>
                                    <a href="{{ URL::to('calificar/'.$u->CODIGO_CURSO.'/'.$u->CODIGO_CATEDRATICO.'/'.$_GET["noCarnet"]) }}"
                                       target="_blank" class="btn btn-success">
                                        Calificar
                                    </a>
                                    {{--<a onClick="eliminarUsuario({{ $u->id }})" class="btn btn-danger">--}}
                                    {{--Eliminar--}}
                                    {{--</a>--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        @if(isset($data['preguntas']))
            <div class="offset-3 col-md-6 form-horizontal">
                <h1 class="text-center">Responder las siguientes preguntas</h1>
                <br>
                <br>
                {{--<form action="{{ URL::to('responderPreguntas') }}" class="offset-3 col-md-6 form-horizontal" method="get"--}}
                {{--enctype="multipart/form-data">--}}
                {{--{{ csrf_field() }}--}}
                <input type="hidden" name="curso-0-0-0-0" value="{{$data['curso']}}">
                <input type="hidden" name="catedratico-0-0-0-0" value="{{$data['catedratico']}}">
                <input type="hidden" name="carnet-0-0-0-0" value="{{$data['carnet']}}">
                @foreach($data['preguntas'] as $u)
                    @if($u->TIPO_COMPONENTE == 2)
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ $u->PREGUNTA }}</label>
                            <textarea class="form-control rTexto" id="exampleFormControlTextarea1" rows="3"
                                      name="id-{{$u->ID}}-pregunta-{{$u->ID}}-0"></textarea>
                            {{--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                        </div>
                    @endif
                    @if($u->TIPO_COMPONENTE == 1)
                        <label for="exampleInputEmail1">{{ $u->PREGUNTA }}</label><br>
                        <div class="form-group form-check" style="margin-left: 50px">
                            @if($u->OPCION1 != "")
                                <div class="row">
                                    <input type="checkbox" class="form-check-input rCheck"
                                           id="id-{{$u->ID}}-opcion1-{{$u->ID}}-primero"
                                           name="id-{{$u->ID}}-opcion1-{{$u->ID}}-primero">
                                    <label class="form-check-label"
                                           for="id-{{$u->ID}}-opcion1-{{$u->ID}}-primero">{{$u->OPCION1}}</label>
                                </div>
                            @endif
                            @if($u->OPCION2 != "")
                                <div class="row">
                                    <input type="checkbox" class="form-check-input rCheck"
                                           id="id-{{$u->ID}}-opcion2-{{$u->ID}}-segundo"
                                           name="id-{{$u->ID}}-opcion2-{{$u->ID}}-segundo">
                                    <label class="form-check-label"
                                           for="id-{{$u->ID}}-opcion2-{{$u->ID}}-segundo">{{$u->OPCION2}}</label>
                                </div>
                            @endif
                            @if($u->OPCION3 != "")
                                <div class="row">
                                    <input type="checkbox" class="form-check-input rCheck"
                                           id="id-{{$u->ID}}-opcion3-{{$u->ID}}-tercero"
                                           name="id-{{$u->ID}}-opcion3-{{$u->ID}}-tercero">
                                    <label class="form-check-label"
                                           for="id-{{$u->ID}}-opcion3-{{$u->ID}}-tercero">{{$u->OPCION3}}</label>
                                </div>
                            @endif
                            @if($u->OPCION4 != "")
                                <div class="row">
                                    <input type="checkbox" class="form-check-input rCheck"
                                           id="id-{{$u->ID}}-opcion4-{{$u->ID}}-cuarto"
                                           name="id-{{$u->ID}}-opcion4-{{$u->ID}}-cuarto">
                                    <label class="form-check-label"
                                           for="id-{{$u->ID}}-opcion4-{{$u->ID}}-cuarto">{{$u->OPCION4}}</label>
                                </div>
                            @endif
                        </div>
                    @endif
                @endforeach
                <button type="submit" class="btn btn-primary col-md-12" onclick="llenar()"> Enviar</button>
                {{--</form>--}}
            </div>
        @endif


        {{--<footer class="my-5 pt-5 text-muted text-center text-small">--}}
        {{--<p class="mb-1">© 2017-2018 Company Name</p>--}}
        {{--<ul class="list-inline">--}}
        {{--<li class="list-inline-item"><a href="#">Privacy</a></li>--}}
        {{--<li class="list-inline-item"><a href="#">Terms</a></li>--}}
        {{--<li class="list-inline-item"><a href="#">Support</a></li>--}}
        {{--</ul>--}}
        {{--</footer>--}}
    </div>




@endsection


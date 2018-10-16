@extends('layouts.app')

@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/teachertest/mantenimiento.js') }}" defer></script>
    {{--<main role="main">--}}
    <script type="text/javascript">
        $(document).ready(function () {
            getAlumno();
            getCatedratico();
        });
    </script>

    <div class="container">


        <div id="accordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                            Mantenimiento de Alumnos
                        </button>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">


                    <div class="row">

                        <div class="col-sm-8">
                            <h2>Crear Alumno:</h2>
                            <div class="form-group">
                                <label for="mid" class="control-label col-sm-2">
                                    Carné
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="mid"
                                           name="id"
                                           placeholder="Ingrese carné"
                                    >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nombre" class="control-label col-sm-2">
                                    Nombre Alumno
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nombre"
                                           name="nombre"
                                           placeholder="Ingrese Nombre"
                                    >
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <button onclick="setAlumno()" class="btn btn-success">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Listado de Alumnos: </h2>
                            <div id="getAlumno"></div>
                        </div>
                        <div class="col-sm-4" [hidden]="hideUpdate">
                            <h2>Modificar Alumno:</h2>
                            <div class="form-group">
                                <label for="mide" class="control-label col-sm-2">
                                    Id
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" readonly id="aid"
                                           name="id" value='5190-11-554'
                                           placeholder="Enter a New id"
                                    >
                                    <input type="hidden" id="aaid">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nombree" class="control-label col-sm-2">
                                    Nombre
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="anombre"
                                           name="nombre" value="César Antonio Hernández del Cid"
                                           placeholder="Enter a New Position"
                                    >
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <button onclick="setEditAlumno()" class="btn btn-success">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo"
                                aria-expanded="false" aria-controls="collapseTwo">
                            Mantenimiento de Catedraticos
                        </button>
                    </h5>
                </div>

                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">


                    <div class="row">

                        <div class="col-sm-8">
                            <h2>Crear Catedrático:</h2>
                            <div class="form-group">
                                <label for="midCS" class="control-label col-sm-2">
                                    Código
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="midCS"
                                           name="midCS"
                                           placeholder="Ingrese código"
                                    >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nombreCs" class="control-label col-sm-2">
                                    Nombre
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nombreCs"
                                           name="nombreCs"
                                           placeholder="Ingrese Nombre"
                                    >
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <button onclick="setCatedratico()" class="btn btn-success">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Listado de Catedráticos: </h2>
                            <div id="getCatedratico"></div>
                        </div>
                        <div class="col-sm-4" [hidden]="hideUpdate">
                            <h2>Modificar Catedrático:</h2>
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label for="codigomC" class="control-label col-sm-2">
                                        Código
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" readonly id="codigomC"
                                               name="codigomC" value='10867'
                                               placeholder="Enter a New id"
                                        >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nombremC" class="control-label col-sm-2">
                                        Nombre
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nombremC"
                                               name="nombremC" value="Sergio Guillermo Gómez Mendoza"
                                               placeholder="Enter a New Position"
                                        >
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-sm-10 col-sm-offset-2">
                                        <button type="submit" class="btn btn-success">
                                            Guardar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>


            <div class="card">
                <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseThree"
                                aria-expanded="false" aria-controls="collapseThree">
                            Mantenimiento de Cursos
                        </button>
                    </h5>
                </div>

                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">


                    <div class="row">

                        <div class="col-sm-8">
                            <h2>Crear Curso:</h2>
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label for="midCS" class="control-label col-sm-2">
                                        Código
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="midCS"
                                               name="midCS"
                                               placeholder="Ingrese código"
                                        >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nombreCs" class="control-label col-sm-2">
                                        Nombre
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nombreCs"
                                               name="nombreCs"
                                               placeholder="Ingrese Nombre"
                                        >
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="seccionC" class="control-label col-sm-2">
                                        Sección
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="seccionC"
                                               name="seccionC"
                                               placeholder="Ingrese Sección"
                                        >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-10 col-sm-offset-2">
                                        <button type="submit" class="btn btn-success">
                                            Guardar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Listado de Cursos: </h2>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Sección</th>
                                    <th>Acciones</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>037</td>
                                    <td>Análisis de Sistemas II</td>
                                    <td>A</td>

                                    <td>
                                        <a (click)="editEmployee(post)" class="btn btn-success">
                                            Editar
                                        </a>
                                        <a (click)="deleteData(post)" class="btn btn-danger">
                                            Eliminar
                                        </a>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-4" [hidden]="hideUpdate">
                            <h2>Modificar Curso:</h2>
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label for="codigomC" class="control-label col-sm-2">
                                        Código
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" readonly id="codigomC"
                                               name="codigomC" value='037'
                                               placeholder="Enter a New id"
                                        >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nombremC" class="control-label col-sm-2">
                                        Nombre
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nombremC"
                                               name="nombremC" value="Análisis de Sistemas II"
                                               placeholder="Enter a New Position"
                                        >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="jornadaC" class="control-label col-sm-2">
                                        Sección
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="jornadaC"
                                               name="jornadaC" value="A"
                                               placeholder="Enter a New Position"
                                        >
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-sm-10 col-sm-offset-2">
                                        <button type="submit" class="btn btn-success">
                                            Guardar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>


            <div class="card">
                <div class="card-header" id="headingFour">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFour"
                                aria-expanded="false" aria-controls="collapseFour">
                            Mantenimiento de Carreras
                        </button>
                    </h5>
                </div>

                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">


                    <div class="row">

                        <div class="col-sm-8">
                            <h2>Crear Carrera:</h2>
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label for="midC" class="control-label col-sm-2">
                                        Código
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="midC"
                                               name="idC"
                                               placeholder="Ingrese código"
                                        >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nombreC" class="control-label col-sm-2">
                                        Nombre
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nombreC"
                                               name="nombreC"
                                               placeholder="Ingrese Nombre"
                                        >
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="jornadaC" class="control-label col-sm-2">
                                        Jornada
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="jornadaC"
                                               name="jornadaC"
                                               placeholder="Ingrese Jornada"
                                        >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="sedeC" class="control-label col-sm-2">
                                        Sede
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="sedeC"
                                               name="sedeC"
                                               placeholder="Ingrese Sede"
                                        >
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-sm-10 col-sm-offset-2">
                                        <button type="submit" class="btn btn-success">
                                            Guardar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Listado de Carreras: </h2>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Jornada</th>
                                    <th>Sede</th>
                                    <th>Acciones</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>5390</td>
                                    <td>Ingeniería en Sistemas</td>
                                    <td>Domingo</td>
                                    <td>Villa Nueva</td>

                                    <td>
                                        <a (click)="editEmployee(post)" class="btn btn-success">
                                            Editar
                                        </a>
                                        <a (click)="deleteData(post)" class="btn btn-danger">
                                            Eliminar
                                        </a>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-4" [hidden]="hideUpdate">
                            <h2>Modificar Carrera:</h2>
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label for="codigomC" class="control-label col-sm-2">
                                        Código
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" readonly id="codigomC"
                                               name="codigomC" value='5390'
                                               placeholder="Enter a New id"
                                        >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nombremC" class="control-label col-sm-2">
                                        Nombre
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nombremC"
                                               name="nombremC" value="Ingeniería en Sistemas"
                                               placeholder="Enter a New Position"
                                        >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="jornadaC" class="control-label col-sm-2">
                                        Jornada
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="jornadaC"
                                               name="jornadaC" value="Domingo"
                                               placeholder="Enter a New Position"
                                        >
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="sedemC" class="control-label col-sm-2">
                                        Sede
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="sedemC"
                                               name="sedemC" value="Villa Nueva"
                                               placeholder="Enter a New Position"
                                        >
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-sm-10 col-sm-offset-2">
                                        <button type="submit" class="btn btn-success">
                                            Guardar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>


    </div>


    </div>

    {{--</main>--}}









@endsection



  
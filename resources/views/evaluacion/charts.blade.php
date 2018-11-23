@extends('layouts.app')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="{{ asset('js/teachertest/estadisticas.js') }}" defer></script>

    <div class="container">

        <h2 class="text-center">Reportes y Charts</h2>
        <div class="card col-md-12">
            <div class="card-header">
                Carreras
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Código carrera</th>
                        <th scope="col">Nombre carrera</th>
                        {{--<th scope="col">Código curso</th>--}}
                        {{--<th scope="col">Nombre curso</th>--}}
                        {{--<th scope="col">Código catedratico</th>--}}
                        {{--<th scope="col">Nombre catedratico</th>--}}
                        <th scope="col">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($data['carreras']))
                        @foreach($data['carreras'] as $u)
                            <tr>
                                <td scope="row">{{ $u->CODIGO_CARRERA }}</td>
                                <td scope="row">{{ $u->NOMBRE_CARRERA }}</td>
                                {{--<td scope="row">{{ $u->CODIGO_CURSO }}</td>--}}
                                {{--<td scope="row">{{ $u->NOMBRE_CURSO }}</td>--}}
                                {{--<td scope="row">{{ $u->CODIGO_CATEDRATICO }}</td>--}}
                                {{--<td scope="row">{{ $u->NOMBRE_CATEDRATICO }}</td>--}}
                                <td>
                                    <a href="{{ URL::to('charts/'.$u->CODIGO_CARRERA) }}" class="btn btn-success">
                                        Seleccionar Carrera
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>

        @if(isset($data['cursos']))
            <div class="card col-md-12">
                <div class="card-header">
                    Cursos
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            {{--<th scope="col">Código carrera</th>--}}
                            {{--<th scope="col">Nombre carrera</th>--}}
                            <th scope="col">Código curso</th>
                            <th scope="col">Nombre curso</th>
                            {{--<th scope="col">Código catedratico</th>--}}
                            {{--<th scope="col">Nombre catedratico</th>--}}
                            <th scope="col">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data['cursos'] as $u)
                            <tr>
                                {{--<td scope="row">{{ $u->CODIGO_CARRERA }}</td>--}}
{{--                                <td scope="row">{{ $u->NOMBRE_CARRERA }}</td>--}}
                                <td scope="row">{{ $u->CODIGO_CURSO }}</td>
                                <td scope="row">{{ $u->NOMBRE_CURSO }}</td>
                                {{--<td scope="row">{{ $u->CODIGO_CATEDRATICO }}</td>--}}
                                {{--<td scope="row">{{ $u->NOMBRE_CATEDRATICO }}</td>--}}
                                <td>
                                    <a href="{{ URL::to('charts/'.$u->CODIGO_CARRERA.'/'.$u->CODIGO_CURSO) }}"
                                       class="btn btn-success">
                                        Seleccionar Profesores
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        @if(isset($data['catedratico']))
            <div class="card col-md-12">
                <div class="card-header">
                    Catedraticos de curso
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            {{--<th scope="col">Código carrera</th>--}}
                            {{--<th scope="col">Nombre carrera</th>--}}
                            {{--<th scope="col">Código curso</th>--}}
                            {{--<th scope="col">Nombre curso</th>--}}
                            <th scope="col">Código catedratico</th>
                            <th scope="col">Nombre catedratico</th>
                            <th scope="col">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data['catedratico'] as $u)
                            <tr>
{{--                                <td scope="row">{{ $u->CODIGO_CARRERA }}</td>--}}
{{--                                <td scope="row">{{ $u->NOMBRE_CARRERA }}</td>--}}
{{--                                <td scope="row">{{ $u->CODIGO_CURSO }}</td>--}}
                                {{--<td scope="row">{{ $u->NOMBRE_CURSO }}</td>--}}
                                <td scope="row">{{ $u->CODIGO_CATEDRATICO }}</td>
                                <td scope="row">{{ $u->NOMBRE_CATEDRATICO }}</td>
                                <td>
                                    <a  onclick="getEstadisticas({{ $u->CODIGO_CATEDRATICO }})"
                                       class="btn btn-success">
                                        Ver Estadisticas de evaluación
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        @if(isset($data['preguntas']))
            @foreach($data['preguntas'] as $u)
                <div id="pregunta{{$u->ID}}"></div>
            @endforeach
        @endif




    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Work', 11],
                ['Eat', 2],
                ['Commute', 2],
                ['Watch TV', 2],
                ['Sleep', 7]
            ]);

            var options = {
                title: 'My Daily Activities'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>

    {{--<div id="piechart" style="width: 900px; height: 500px;"></div>--}}





    <script type="text/javascript">
        google.charts.load("current", {packages: ["corechart"]});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Work', 11],
                ['Eat', 2],
                ['Commute', 2],
                ['Watch TV', 2],
                ['Sleep', 7]
            ]);

            var options = {
                title: 'My Daily Activities',
                pieHole: 0.4,
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
        }
    </script>
    {{--<div id="donutchart" style="width: 900px; height: 500px;"></div>--}}


    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawVisualization);

        function drawVisualization() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['Month', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Average'],
                ['2004/05', 165, 938, 522, 998, 450, 614.6],
                ['2005/06', 135, 1120, 599, 1268, 288, 682],
                ['2006/07', 157, 1167, 587, 807, 397, 623],
                ['2007/08', 139, 1110, 615, 968, 215, 609.4],
                ['2008/09', 136, 691, 629, 1026, 366, 569.6]
            ]);

            var options = {
                title: 'Monthly Coffee Production by Country',
                vAxis: {title: 'Cups'},
                hAxis: {title: 'Month'},
                seriesType: 'bars',
                series: {5: {type: 'line'}}
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
    {{--<div id="chart_div" style="width: 900px; height: 500px;"></div>--}}


    <script type="text/javascript">
        google.charts.load('current', {'packages': ['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Year', 'Sales', 'Expenses', 'Profit'],
                ['2014', 1000, 400, 200],
                ['2015', 1170, 460, 250],
                ['2016', 660, 1120, 300],
                ['2017', 1030, 540, 350]
            ]);

            var options = {
                chart: {
                    title: 'Company Performance',
                    subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
    {{--<div id="columnchart_material" style="width: 800px; height: 500px;"></div>--}}

    <script type="text/javascript">
        google.charts.load('current', {'packages': ['bar']});
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
            var data = new google.visualization.arrayToDataTable([
                ['Move', 'Percentage'],
                ["King's pawn (e4)", 44],
                ["Queen's pawn (d4)", 31],
                ["Knight to King 3 (Nf3)", 12],
                ["Queen's bishop pawn (c4)", 10],
                ['Other', 3]
            ]);

            var options = {
                width: 800,
                legend: {position: 'none'},
                chart: {
                    title: 'Chess opening moves',
                    subtitle: 'popularity by percentage'
                },
                axes: {
                    x: {
                        0: {side: 'top', label: 'White to move'} // Top x-axis.
                    }
                },
                bar: {groupWidth: "90%"}
            };

            var chart = new google.charts.Bar(document.getElementById('top_x_div'));
            // Convert the Classic options to Material options.
            chart.draw(data, google.charts.Bar.convertOptions(options));
        };
    </script>
    {{--<div id="top_x_div" style="width: 800px; height: 600px;"></div>--}}

    <script type="text/javascript">
        google.charts.load("current", {packages: ["corechart"]});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Language', 'Speakers (in millions)'],
                ['Assamese', 13], ['Bengali', 83], ['Bodo', 1.4],
                ['Dogri', 2.3], ['Gujarati', 46], ['Hindi', 300],
                ['Kannada', 38], ['Kashmiri', 5.5], ['Konkani', 5],
                ['Maithili', 20], ['Malayalam', 33], ['Manipuri', 1.5],
                ['Marathi', 72], ['Nepali', 2.9], ['Oriya', 33],
                ['Punjabi', 29], ['Sanskrit', 0.01], ['Santhali', 6.5],
                ['Sindhi', 2.5], ['Tamil', 61], ['Telugu', 74], ['Urdu', 52]
            ]);

            var options = {
                title: 'Indian Language Use',
                legend: 'none',
                pieSliceText: 'label',
                slices: {
                    4: {offset: 0.2},
                    12: {offset: 0.3},
                    14: {offset: 0.4},
                    15: {offset: 0.5},
                },
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
            chart.draw(data, options);
        }
    </script>
    {{--<div id="piechart2" style="width: 900px; height: 500px;"></div>--}}






    </div>
@endsection
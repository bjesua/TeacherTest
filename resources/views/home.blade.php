@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            {{--<div class="card">--}}
                {{--<div class="card-header">Dashboard</div>--}}

                {{--<div class="card-body">--}}
                    {{--@if (session('status'))--}}
                        {{--<div class="alert alert-success" role="alert">--}}
                            {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    {{--Panel de usuario--}}
                {{--</div>--}}

            {{--</div>--}}

            <h2 class="text-center display-3">Listado de Apps</h2>

            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Control de Usuarios</h5>
                            <a href="{{ route('mantUsuarios') }}" style="text-decotarion:none"> <i class="fas fa-users" style="font-size: 136px;"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Preguntas</h5>
                            <a href="{{ route('mantPreguntas') }}" style="text-decotarion:none"><i class="fas fa-question-circle" style="font-size: 136px;"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Reportes</h5>
                            <a href="{{ route('charts') }}" style="text-decotarion:none"><i class="fas fa-chart-pie" style="font-size: 136px;"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

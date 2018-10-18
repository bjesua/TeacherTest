@extends('layouts.app')

@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/teachertest/mantenimiento.js') }}" defer></script>
    {{--<main role="main">--}}
    <script type="text/javascript">
        $(document).ready(function () {
//            $("#botonUpdate").hide();
        });
    </script>

    <div class="container">

        <div class="card">
            <div class="card-header">{{ __('Registrar') }}</div>
            <div class="card-body">
                <form method="POST" action="/create" aria-label="{{ __('Register') }}" id="formularioGuardar">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text"
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                   value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                   value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password"
                               class="col-md-4 col-form-label text-md-right">{{ __('Clave') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm"
                               class="col-md-4 col-form-label text-md-right">{{ __('Confirmar clave') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <input type="hidden" id="UidUsuario" class="form-control" name="UidUsuario">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary" id="botonGuardar">
                                {{ __('Registrar') }}
                            </button>

                            {{--<button class="btn btn-primary" id="botonUpdate">--}}
                                {{--{{ __('Actualizar') }}--}}
                            {{--</button>--}}
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <br>

        <div class="card">
            <div class="card-header">
                Usuarios
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Usuario</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($usuarios as $u)
                        <tr>
                            <td scope="row">{{ $u->name }}</td>
                            <td scope="row">{{ $u->email }}</td>
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



@endsection
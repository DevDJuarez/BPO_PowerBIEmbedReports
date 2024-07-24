@extends('layouts.template')
@section('css')
    <style>
        .msg-error {
            color: #fa5c7c;
        }
    </style>
@endsection
@section('contenido')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('empresas.index') }}">Empresas</a></li>
                        <li class="breadcrumb-item active">Actualizar Empresa</li>
                    </ol>
                </div>
                <h4 class="page-title">Empresas</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('empresas.update', $empresa->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                        placeholder="Nombre" required value="{{ $empresa->nombre }}">
                                    @error('nombre')
                                        <div class="msg-error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="correo">Correo electrónico</label>
                                    <input type="email" class="form-control" id="correo" name="correo"
                                        placeholder="Correo electrónico" required  value="{{ $empresa->correo }}">
                                    @error('correo')
                                        <div class="msg-error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="usuario">Cuenta PowerBI Usuario</label>
                                    <input type="email" class="form-control" id="usuario" name="usuario"
                                        placeholder="Correo electrónico" required  value="{{ $empresa->usuario }}">
                                    @error('usuario')
                                        <div class="msg-error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="clave">Cuenta PowerBI Contraseña</label>
                                    <input type="text" class="form-control" id="clave" name="clave"
                                        placeholder="Contraseña" required  value="{{ $empresa->clave }}">
                                    @error('clave')
                                        <div class="msg-error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="client_id">Cuenta PowerBI Client ID</label>
                                    <input type="text" class="form-control" id="client_id" name="client_id"
                                        placeholder="Client ID de la Cuenta PowerBI" required  value="{{ $empresa->client_id }}">
                                    @error('client_id')
                                        <div class="msg-error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="client_secret">Cuenta PowerBI Client Secret</label>
                                    <input type="text" class="form-control" id="client_secret" name="client_secret"
                                        placeholder="Client Secret de la Cuenta PowerBI" required  value="{{ $empresa->client_secret }}">
                                    @error('client_secret')
                                        <div class="msg-error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

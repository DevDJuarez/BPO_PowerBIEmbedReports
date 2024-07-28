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
                        <li class="breadcrumb-item"><a
                                href="{{ route('empresas.usuarios', [Str::slug($empresa->nombre), $empresa->id]) }}">Usuarios</a>
                        </li>
                        <li class="breadcrumb-item active">Resetear contraseña de usuario</li>
                    </ol>
                </div>
                <h4 class="page-title">Usuario de la empresa {{ $empresa->nombre }}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
                            role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Éxito - </strong> {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show"
                            role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h4 class="header-title mb-4">Reseteo de contraseña de usuario: <b> {{ $user->name }}</b></h4>
                    <form action="{{ route('empresas.usuarios.reset.store', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="empresa_id" value="{{ $empresa->id }}">
                        <div class="mb-3">
                            <label class="form-label" for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Contraseña" required>
                            @error('password')
                                <div class="msg-error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

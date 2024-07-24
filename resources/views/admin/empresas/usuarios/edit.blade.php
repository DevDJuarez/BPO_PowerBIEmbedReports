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
                        <li class="breadcrumb-item active">Actualizar Usuario</li>
                    </ol>
                </div>
                <h4 class="page-title">Usuarios</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('empresas.usuarios.update', $usuario->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="empresa_id" value="{{ $empresa->id }}">
                        <div class="mb-3">
                            <label class="form-label" for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Nombre Completo" required value="{{ $usuario->name }}">
                            @error('name')
                                <div class="msg-error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">Correo electrónico</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Correo electrónico" required value="{{ $usuario->email }}">
                            @error('email')
                                <div class="msg-error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button class="btn btn-primary" type="submit">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

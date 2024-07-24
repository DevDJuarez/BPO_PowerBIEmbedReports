@extends('layouts.template')
@section('css')
    <style>
        .msg-error{
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
                        <li class="breadcrumb-item"><a href="{{ route('usuarios.index') }}">Usuarios</a></li>
                        <li class="breadcrumb-item active">Agregar Usuario</li>
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
                    <form action="{{ route('usuarios.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Nombre Completo" required>
                            @error('name')
                                <div class="msg-error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">Correo electrónico</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Correo electrónico" required>
                            @error('email')
                                <div class="msg-error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
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
                        <div class="mb-3">
                            <label class="form-label" for="password_confirmation">Confirmar Contraseña</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" placeholder="Confirmar contraseña" required>
                            @error('password_confirmation')
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

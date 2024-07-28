@extends('layouts.template-horizontal')
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
                        <li class="breadcrumb-item active">Perfil</li>
                    </ol>
                </div>
                <h4 class="page-title">Configuración</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="card text-center">
                <div class="card-body">
                    <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
                        class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                    <h4 class="mb-0 mt-2">{{ auth()->user()->name }}</h4>
                    <p class="text-muted font-14">Administrador</p>
                    <div class="text-start mt-3">
                        <p class="text-muted mb-2 font-13"><strong>Nombre :</strong> <span
                                class="ms-2">{{ auth()->user()->name }}</span></p>
                        <p class="text-muted mb-2 font-13"><strong>Correo :</strong> <span
                                class="ms-2 ">{{ auth()->user()->email }}</span></p>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col-->

        <div class="col-xl-8 col-lg-7">
            <div class="card">
                <div class="card-body">
                    <div class="tab-pane" id="settings">
                        <form method="POST" action="{{ route('business.perfil.dataUpdate') }}">
                            @csrf
                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Información de la
                                cuenta</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="" value="{{ auth()->user()->name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Correo electrónico</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="" value="{{ auth()->user()->email }}">
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i>
                                    Actualizar</button>
                            </div>
                        </form>
                    </div>
                    <!-- end settings content-->
                </div> <!-- end card body -->
            </div> <!-- end card -->
            <div class="card">
                <div class="card-body">
                    <div class="tab-pane" id="settings">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show"
                                role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
                                role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                <strong>Éxito - </strong> {{ session('success') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('business.password.change') }}">
                            @csrf
                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Actualización de
                                contraseña</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="current_password" class="form-label">Contraseña Actual</label>
                                        <input type="password" class="form-control" id="current_password"
                                            name="current_password" placeholder="Nueva Contraseña" required>
                                        @error('current_password')
                                            <div class="msg-error">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="new_password" class="form-label">Contraseña Nueva</label>
                                        <input type="password" class="form-control" id="new_password" name="new_password"
                                            placeholder="" required>
                                        @error('new_password')
                                            <div class="msg-error">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="new_password_confirmation" class="form-label">Confirmar Nueva
                                            Contraseña</label>
                                        <input type="password" class="form-control" name="new_password_confirmation"
                                            placeholder="" required>
                                        @error('new_password_confirmation')
                                            <div class="msg-error">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i>
                                    Actualizar</button>
                            </div>
                        </form>
                    </div>
                    <!-- end settings content-->
                </div> <!-- end card body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
        <div class="col-xl-8 col-lg-7">

        </div> <!-- end col -->
    </div>
@endsection

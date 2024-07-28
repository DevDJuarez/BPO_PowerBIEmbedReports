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
                        <li class="breadcrumb-item active">Perfil</li>
                    </ol>
                </div>
                <h4 class="page-title">Configuración - Login</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-6 col-lg-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title m-t-0">Imagen principal</h4>
                    <p class="text-muted font-14">
                        Permite modificar la imagen que se visualiza en el login. Se recomienda colocar una imagen con
                        dimensiones 2000px x 1333px
                    </p>
                    <div class="row">
                        @if ($imagen)
                            <img src="{{ asset('storage/images') . '/' . $imagen->path }}" alt="Background Auth">
                        @else
                            <img src="{{ asset('storage/images/auth/bg-auth.jpg') }}" alt="Background Auth">
                        @endif
                    </div>
                    <div class="divider"></div>
                    <form action="{{ route('login.imagen.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <label class="form-label">Background</label>
                                <input class="form-control" type="file" id="inputGroupFile04" name="imagen">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar Background</button>
                    </form>
                    {{-- <div class="tab-pane show active" id="file-upload-preview">
                        <form action="/" method="post" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone"
                            data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                            <div class="fallback">
                                <input name="file" type="file" multiple="">
                            </div>

                            <div class="dz-message needsclick">
                                <i class="h1 text-muted dripicons-cloud-upload"></i>
                                <h3>Suelte los archivos aquí o haga clic para cargarlos.</h3>
                            </div>
                        </form>

                        <!-- Preview -->
                        <div class="dropzone-previews mt-3" id="file-previews"></div>

                        <!-- file preview template -->
                        <div class="d-none" id="uploadPreviewTemplate">
                            <div class="card mt-1 mb-0 shadow-none border">
                                <div class="p-2">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light"
                                                alt="">
                                        </div>
                                        <div class="col ps-0">
                                            <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name></a>
                                            <p class="mb-0" data-dz-size></p>
                                        </div>
                                        <div class="col-auto">
                                            <!-- Button -->
                                            <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                                <i class="dripicons-cross"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col-->

    </div>
@endsection

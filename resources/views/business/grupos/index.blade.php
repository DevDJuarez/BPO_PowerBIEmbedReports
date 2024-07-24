@extends('layouts.template')

@section('contenido')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Espacios de trabajos</li>
                    </ol>
                </div>
                <h4 class="page-title">Espacios de trabajos</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mx-n1 g-0">
                        @foreach ($empresa->workspaces as $item)
                            <div class="col-xxl-3 col-lg-6">
                                <div class="card m-1 shadow-none border">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-light text-secondary rounded">
                                                        <i class="mdi mdi-folder font-16"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col ps-0">
                                                <a href="{{ route('business.grupos.reportes', [Str::slug($empresa->nombre), $item->id]) }}"
                                                    class="text-muted fw-bold">{{ $item->name }}</a>
                                                <p class="mb-0 font-13">Espacio de trabajo</p>
                                            </div>
                                        </div> <!-- end row -->
                                    </div> <!-- end .p-2-->
                                </div> <!-- end col -->
                            </div> <!-- end col-->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


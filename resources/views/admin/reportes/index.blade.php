@extends('layouts.template')

@section('contenido')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('empresas.index') }}">Empresas</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('empresas.grupos', [Str::slug($workspace->empresa->nombre), $workspace->empresa->id, 0]) }}">Espacios de trabajos</a></li>
                        <li class="breadcrumb-item active">Reportes</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ $workspace->name }} - Reportes</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="{{ route('grupos.reportes', [Str::slug($workspace->empresa->nombre), $workspace->id, 1]) }}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i>
                                Sincronizar</a>
                        </div>
                        <div class="col-sm-8">
                        </div>
                    </div>
                    <div class="row mx-n1 g-0">
                        @foreach ($workspace->reportes as $item)
                            <div class="col-xxl-3 col-lg-6">
                                <div class="card m-1 shadow-none border">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar-sm">
                                                    <span class="avatar-title bg-light text-secondary rounded">
                                                        <i class="mdi mdi-file-chart-outline font-16"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col ps-0">
                                                <a href="{{ route('reportes.show', [Str::slug($workspace->empresa->nombre), $item->id]) }}"
                                                    class="text-muted fw-bold">{{ $item->name }}</a>
                                                <p class="mb-0 font-13">Reporte Power BI</p>
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

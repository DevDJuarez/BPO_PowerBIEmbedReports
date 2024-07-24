@extends('layouts.template')

@section('contenido')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Inicio</li>
                    </ol>
                </div>
                <h4 class="page-title">Inicio</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card widget-inline">
                <div class="card-body p-0">
                    <div class="row g-0">
                        <div class="col-sm-6 col-xl-3">
                            <div class="card shadow-none m-0">
                                <div class="card-body text-center">
                                    <i class="dripicons-user-group text-muted" style="font-size: 24px;"></i>
                                    <h3><span>{{ $totalUsuarios }}</span></h3>
                                    <p class="text-muted font-15 mb-0">Total Usuarios</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="card shadow-none m-0 border-start">
                                <div class="card-body text-center">
                                    <i class=" dripicons-store text-muted" style="font-size: 24px;"></i>
                                    <h3><span>{{ $totalEmpresas }}</span></h3>
                                    <p class="text-muted font-15 mb-0">Total Empresas</p>
                                </div>
                            </div>
                        </div>

                    </div> <!-- end row -->
                </div>
            </div> <!-- end card-box-->
        </div> <!-- end col-->
    </div>
@endsection

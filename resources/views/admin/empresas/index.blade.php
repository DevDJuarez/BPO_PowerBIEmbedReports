@extends('layouts.template')
@section('css')
    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('contenido')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Empresas</li>
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
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a class="btn btn-danger mb-2" href="{{ route('empresas.create') }}"><i class="mdi mdi-plus-circle me-2"></i> Agregar
                                Empresa</a>
                        </div>
                        <div class="col-sm-8">
                            {{-- <div class="text-sm-end">
                                <button type="button" class="btn btn-success mb-2 me-1"><i
                                        class="mdi mdi-cog-outline"></i></button>
                                <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                                <button type="button" class="btn btn-light mb-2">Export</button>
                            </div> --}}
                        </div><!-- end col-->
                    </div>
                    <div>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
                                role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                <strong>Éxito - </strong> {{ session('success') }}
                            </div>
                        @endif
                        <table id="datatable-data" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Cuenta PowerBI Correo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($empresas as $item)
                                    <tr>
                                        <td>{{ $item->nombre }}</td>
                                        <td>{{ $item->correo }}</td>
                                        <td>{{ $item->usuario }}</td>
                                        <td class="table-action">
                                            <a href="{{ route('empresas.edit', $item->id) }}" class="action-icon">
                                                <i class="mdi mdi-square-edit-outline"></i></a>
                                            <a class="action-icon" onclick="confirmDelete('{{ $item->id }}')">
                                                <i class="mdi mdi-delete"></i></a>
                                            <a href="{{ route('empresas.usuarios', [Str::slug($item->nombre), $item->id]) }}"
                                                class="action-icon"> <i class="mdi mdi-human-male-male"></i></a>
                                            <a href="{{ route('empresas.grupos', [Str::slug($item->nombre), $item->id, 0]) }}"
                                                class="action-icon"> <i class="mdi mdi-folder-multiple-outline"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.empresas.frmModales')
@endsection

@section('js')
    <script src="{{ asset('assets/js/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/responsive.bootstrap5.min.js') }}"></script>
    <script>
        function confirmDelete(userId) {
            const url= "{{ url('admin/empresas') }}"+ '/'+userId;
            const deleteForm = document.getElementById('deleteForm');
            deleteForm.action = url;
            const confirmDeleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
            confirmDeleteModal.show();
        }
        $(document).ready(function() {
            "use strict";
            var tabla = $("#datatable-data").DataTable({
                keys: !0,
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json",
                    paginate: {
                        previous: "<i class='mdi mdi-chevron-left'>",
                        next: "<i class='mdi mdi-chevron-right'>"
                    }
                },
                drawCallback: function() {
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
                }
            });

        });
    </script>
@endsection

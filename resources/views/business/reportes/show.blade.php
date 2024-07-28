@extends('layouts.template-horizontal')
@section('css')
    <style>
        .btnFullScreen:hover {
            cursor: pointer;
        }
        /* .reportContainer {
            position: relative;
            width: 100%;
            padding-top: 56.25%; // 16:9 Aspect Ratio
            height: 0;
            overflow: hidden;
        }
        .reportContainer iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }
        #divFullScreen{
            height: 90vh;
        } */
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
                        <li class="breadcrumb-item"><a href="{{ route('business.grupos.index', [Str::slug($reporte->workspace->empresa->nombre), $reporte->workspace->empresa->id]) }}">Espacios de trabajos</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('business.grupos.reportes', [Str::slug($reporte->workspace->empresa->nombre), $reporte->workspace->id]) }}">Reportes</a></li>

                        <li class="breadcrumb-item active">Reportes</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ $reporte->name }}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card d-block">
                <div id="divFullScreen" class="card-body">
                    <div class="dropdown card-widgets mb-2">
                        <span id="btnFullScreen" class="dropdown-toggle arrow-none btnFullScreen">
                            <i class="uil uil-expand-arrows-alt"></i>
                        </span>
                    </div>
                    <div id="reportContainer" style="height: 70vh"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        const btnFullScreen = document.getElementById('btnFullScreen');
        const divFullScreen = document.getElementById('reportContainer');

        function openFullscreen() {
            if (divFullScreen.requestFullscreen) {
                divFullScreen.requestFullscreen();
            } else if (divFullScreen.mozRequestFullScreen) { // Firefox
                divFullScreen.mozRequestFullScreen();
            } else if (divFullScreen.webkitRequestFullscreen) { // Chrome, Safari y Opera
                divFullScreen.webkitRequestFullscreen();
            } else if (divFullScreen.msRequestFullscreen) { // IE/Edge
                divFullScreen.msRequestFullscreen();
            }
        }

        // Agrega un evento al botón para activar la función openFullscreen
        btnFullScreen.addEventListener('click', openFullscreen);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/powerbi-client@2.18.7/dist/powerbi.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var embedUrl = "{{ $reporte->embedUrl }}";
            var accessToken = "{{ $accessToken }}";
            var reportId = "{{ $reporte->reportId }}";

            var models = window['powerbi-client'].models;
            var embedConfiguration = {
                type: 'report',
                id: reportId,
                embedUrl: embedUrl,
                accessToken: accessToken,
                tokenType: models.TokenType.Aad,
                settings: {
                    panes: {
                        filters: {
                            visible: false
                        },
                        pageNavigation: {
                            visible: true
                        }
                    }
                }
            };

            var reportContainer = document.getElementById('reportContainer');
            var powerbi = window.powerbi;
            powerbi.embed(reportContainer, embedConfiguration);

            window.addEventListener('resize', function() {
                powerbi.get(reportContainer).then(function(report) {
                    report.resize();
                });
            });
        });
    </script>
@endsection

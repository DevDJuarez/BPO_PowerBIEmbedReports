@extends('layouts.app')

@section('content')
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>{{ $nombre }}</h4>
                    <div id="reportContainer" style="height:600px;"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/powerbi-client@2.18.7/dist/powerbi.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var embedUrl = "{{ $embedUrl }}";
            var accessToken = "{{ $accessToken }}";
            var reportId = "{{ $reportId }}";

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
        });
    </script>
@endsection

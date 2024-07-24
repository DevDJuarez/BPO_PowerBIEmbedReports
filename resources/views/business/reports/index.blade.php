@extends('layouts.app')

@section('content')
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if (session()->has('message'))
                        <h5 class="alert alert-success">{{ session('message') }}</h5>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <h4>Reportes</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-borderd table-striped">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($reportes as $item)
                                            <tr>
                                                <td><a href="{{ route('reportes.show', [Str::slug($empresa->nombre), $empresa->id, $item['id']]) }}" class="btn btn-link"> {{ $item['name'] }}</a></td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">No se encontraron registros</td>
                                            </tr>
                                        @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

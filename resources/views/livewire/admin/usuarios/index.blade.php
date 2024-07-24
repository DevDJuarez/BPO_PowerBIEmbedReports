<div>
    {{-- @include('livewire.admin.usuarios.frmModal') --}}

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            {{-- <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal"
                            data-bs-target="#crearModal"><i
                                    class="mdi mdi-plus-circle me-2"></i> Agregar Usuario</button> --}}
                            <a class="btn btn-danger mb-2" href="{{ route('usuarios.create') }}"><i
                                    class="mdi mdi-plus-circle me-2"></i> Agregar Usuario</a>
                        </div>
                        <div class="col-sm-8">
                        </div>
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
                        <table id="datatable-data" class="table dt-responsive nowrap w-100 table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($usuarios as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td class="table-action">
                                            <a href="{{ route('usuarios.edit', $item->id) }}" class="action-icon"> <i
                                                    class="mdi mdi-square-edit-outline"></i></a>
                                            <button class="action-icon" onclick="confirmDelete('{{ $item->id }}')"> <i
                                                    class="mdi mdi-delete"></i></button>
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
</div>

@section('js')
    <script>

    </script>
@endsection

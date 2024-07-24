<div>
    @include('livewire.admin.empresas.frmModal')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                    <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Empresas
                            <input type="search" wire:model="search" class="form-control float-end mx-2"
                                placeholder="Buscar..." style="width: 230px" />
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                data-bs-target="#crearModal">
                                Nueva Empresa
                            </button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderd table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($empresas as $item)
                                    <tr>
                                        <td>{{ $item->nombre }}</td>
                                        <td>{{ $item->correo }}</td>
                                        <td>
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#actualizarModal" wire:click="edit('{{ $item->id }}')"
                                                class="btn btn-primary btn-sm">
                                                Editar
                                            </button>
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#eliminarModal" wire:click="delete('{{ $item->id }}')"
                                                class="btn btn-danger btn-sm">Eliminar</button>
                                            <a href="{{ route('empresas.usuarios', [Str::slug($item->nombre), $item->id]) }}"
                                                class="btn btn-secondary btn-sm">Usuarios</a>
                                            <a href="{{ route('empresas.grupos', [Str::slug($item->nombre), $item->id, 0]) }}"
                                                class="btn btn-secondary btn-sm">Espacios de trabajo</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No se encontraron registros</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{-- <div>
                            {{ $empresas->links() }}
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

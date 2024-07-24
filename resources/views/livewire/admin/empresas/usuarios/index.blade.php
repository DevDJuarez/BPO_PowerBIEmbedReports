<div>
    @include('livewire.admin.empresas.usuarios.frmModal')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal"
                            data-bs-target="#crearModal"><i
                                    class="mdi mdi-plus-circle me-2"></i> Agregar Usuario</button>
                        </div>
                        <div class="col-sm-8">
                        </div>
                    </div>
                    <div>
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100 table-hover">
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
                                            <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal"
                                            data-bs-target="#actualizarModal" wire:click="edit('{{ $item->id }}')"> <i class="mdi mdi-square-edit-outline"></i></a>
                                            <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal"
                                            data-bs-target="#eliminarModal" wire:click="delete('{{ $item->id }}')"> <i class="mdi mdi-delete"></i></a>
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

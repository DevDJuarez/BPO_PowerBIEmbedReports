<div>
    @include('livewire.admin.empresas.frmModal')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal"
                            data-bs-target="#crearModal"><i
                                    class="mdi mdi-plus-circle me-2"></i> Agregar Empresa</button>
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
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
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
                                        <td class="table-action">
                                            <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal"
                                            data-bs-target="#actualizarModal" wire:click="edit('{{ $item->id }}')"> <i class="mdi mdi-square-edit-outline"></i></a>
                                            <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal"
                                            data-bs-target="#eliminarModal" wire:click="delete('{{ $item->id }}')"> <i class="mdi mdi-delete"></i></a>
                                            <a href="{{ route('empresas.usuarios', [Str::slug($item->nombre), $item->id]) }}" class="action-icon"> <i class="mdi mdi-human-male-male"></i></a>
                                            <a href="{{ route('empresas.grupos', [Str::slug($item->nombre), $item->id, 0]) }}" class="action-icon"> <i class="mdi mdi-folder-multiple-outline"></i></a>
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

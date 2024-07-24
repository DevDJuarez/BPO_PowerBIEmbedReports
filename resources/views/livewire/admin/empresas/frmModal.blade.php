<!-- Insert Modal -->
<div wire:ignore.self class="modal fade" id="crearModal" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearModalLabel">Crear Empresa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="cerrarModal"></button>
            </div>
            <form wire:submit.prevent="store">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nombre</label>
                        <input type="text" wire:model="nombre" class="form-control">
                        @error('nombre')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Correo electrónico</label>
                        <input type="text" wire:model="correo" class="form-control">
                        @error('correo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Cuenta PowerBI Usuario</label>
                        <input type="text" wire:model="usuario" class="form-control">
                        @error('usuario')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Cuenta PowerBI Contraseña</label>
                        <input type="text" wire:model="clave" class="form-control">
                        @error('clave')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="cerrarModal"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Modal -->
<div wire:ignore.self class="modal fade" id="actualizarModal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="actualizarModalLabel" aria-hidden="true">>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="actualizarModalLabel">Editar Empresa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="cerrarModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="update">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nombre</label>
                        <input type="text" wire:model="nombre" class="form-control">
                        @error('nombre')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Correo</label>
                        <input type="text" wire:model="correo" class="form-control">
                        @error('correo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Cuenta PowerBI Usuario</label>
                        <input type="text" wire:model="usuario" class="form-control">
                        @error('usuario')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Cuenta PowerBI Contraseña</label>
                        <input type="text" wire:model="clave" class="form-control">
                        @error('clave')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="cerrarModal"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div wire:ignore.self class="modal fade" id="eliminarModal" tabindex="-1" aria-labelledby="eliminarModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminarModalLabel">Eliminar Empresa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="cerrarModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroy">
                <div class="modal-body">
                    <h4>¿Estás seguro que deseas eliminar esta empresa?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="cerrarModal"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Si! Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Insert Modal -->
<div wire:ignore.self class="modal fade" id="crearModal" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearModalLabel">Crear Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="cerrarModal"></button>
            </div>
            <form wire:submit.prevent="store">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nombre</label>
                        <input type="text" wire:model="name" class="form-control">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Correo electrónico</label>
                        <input type="email" wire:model="email" class="form-control">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Contraseña</label>
                        <input type="password" wire:model="password" class="form-control">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Confirmar Contraseña</label>
                        <input type="password" wire:model="password_confirmation" class="form-control">
                        @error('password_confirmation')
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
                        <input type="text" wire:model="name" class="form-control" required>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Correo</label>
                        <input type="email" wire:model="email" class="form-control" required>
                        @error('email')
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

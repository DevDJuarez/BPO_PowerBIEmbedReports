@extends('layouts.app')

@section('content')
    <div>
        <livewire:admin.empresa-livewire>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('cerrar-modal', (event) => {
                const crearModal = document.getElementById('crearModal');
                var modalInstance = bootstrap.Modal.getOrCreateInstance(crearModal);
                modalInstance.hide();
                const actualizarModal = document.getElementById('actualizarModal');
                modalInstance = bootstrap.Modal.getOrCreateInstance(actualizarModal);
                modalInstance.hide();
                const eliminarModal = document.getElementById('eliminarModal');
                modalInstance = bootstrap.Modal.getOrCreateInstance(eliminarModal);
                modalInstance.hide();
            });
        });
    </script>
@endsection

<div>
    @push('vendors-css')
        <link rel="stylesheet" href="{{ asset('vendors/css/dataTables.bs5.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/css/sweetalert2.min.css') }}">
    @endpush

    <div class="container-fluid py-4">

        {{-- Encabezado --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">Usuarios</h4>
            <button wire:click="openCreateModal" class="btn btn-primary">
                + Agregar Usuario
            </button>
        </div>

        {{-- Tabla --}}
        <div class="card">
            <div class="card-body">
                <table id="exampleDataTable" class="table table-hover mb-0" style="width: 100%">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Creado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('users.show', $user) }}" class="btn btn-sm btn-info">Ver</a>
                                    <button wire:click="openEditModal({{ $user->id }})"
                                        class="btn btn-sm btn-warning">Editar</button>
                                    <button onclick="confirmDelete({{ $user->id }})"
                                        class="btn btn-sm btn-danger">Eliminar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    @if ($showModal)
        <div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,0.5);">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            {{ $form->user ? 'Editar Usuario' : 'Nuevo Usuario' }}
                        </h5>
                        <button type="button" class="btn-close" wire:click="closeModal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nombre <span class="text-danger">*</span></label>
                            <input wire:model="form.name" type="text"
                                class="form-control @error('form.name') is-invalid @enderror"
                                placeholder="Ingresa el nombre">
                            @error('form.name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email <span class="text-danger">*</span></label>
                            <input wire:model="form.email" type="email"
                                class="form-control @error('form.email') is-invalid @enderror"
                                placeholder="Ingresa el email">
                            @error('form.email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal">Cancelar</button>
                        <button type="button" class="btn btn-primary" wire:click="save" wire:loading.attr="disabled">
                            <span wire:loading wire:target="save" class="spinner-border spinner-border-sm me-1"></span>
                            Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @push('vendors')
        <script src="{{ asset('vendors/js/dataTables.min.js') }}"></script>
        <script src="{{ asset('vendors/js/dataTables.bs5.min.js') }}"></script>
        <script src="{{ asset('vendors/js/sweetalert2.min.js') }}"></script>
        <script>
            // Toast reutilizable
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });

            // Confirmar eliminación
            function confirmDelete(id) {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: 'Esta acción no se puede revertir.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar',
                }).then(function(result) {
                    if (result.value) {
                        @this.delete(id);
                    }
                });
            }

            // Inicializar DataTable
            function initDataTable() {
                if ($.fn.DataTable.isDataTable('#exampleDataTable')) {
                    $('#exampleDataTable').DataTable().destroy();
                }
                $('#exampleDataTable').DataTable({
                    pageLength: 5,
                    lengthMenu: [5, 10, 25, 50, 100],
                });
            }

            // Livewire eventos
            document.addEventListener('livewire:initialized', () => {
                initDataTable();

                Livewire.hook('commit', ({
                    succeed
                }) => {
                    succeed(() => initDataTable());
                });

                Livewire.on('user-saved', () => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Usuario guardado correctamente.'
                    });
                });

                Livewire.on('user-deleted', () => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Usuario eliminado correctamente.'
                    });
                });
            });
        </script>
    @endpush
</div>

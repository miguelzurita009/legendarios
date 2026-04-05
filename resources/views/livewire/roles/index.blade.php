<div>
    @push('vendors-css')
        <link rel="stylesheet" href="{{ asset('vendors/css/dataTables.bs5.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/css/sweetalert2.min.css') }}">
    @endpush

    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Roles</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Roles</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <div class="d-flex d-md-none">
                    <a href="javascript:void(0)" class="page-header-right-close-toggle">
                        <i class="feather-arrow-left me-2"></i>
                        <span>Back</span>
                    </a>
                </div>
                <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                    <button wire:click="openCreateModal" class="btn btn-primary">
                        <i class="feather-plus me-2"></i>
                        <span>Crear Rol</span>
                    </button>
                </div>
            </div>
            <div class="d-md-none d-flex align-items-center">
                <a href="javascript:void(0)" class="page-header-right-open-toggle">
                    <i class="feather-align-right fs-20"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card stretch stretch-full">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table id="rolesDataTable" class="table table-hover mb-0" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>

                                        <th>Creado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <button wire:click="openEditModal({{ $role->id }})"
                                                        class="btn btn-sm btn-warning">
                                                        <i class="fa-solid fa-pen-to-square me-1"></i>Editar
                                                    </button>
                                                    <button onclick="confirmDelete({{ $role->id }})"
                                                        class="btn btn-sm btn-danger">
                                                        <i class="fa-solid fa-trash me-1"></i>Eliminar
                                                    </button>
                                                </div>
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

    {{-- MODAL CREAR ROL --}}
    @if ($showModal)
        <div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,0.5);">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            {{ $form->role ? 'Editar Rol' : 'Nuevo Rol' }}
                        </h5>
                        <button type="button" class="btn-close" wire:click="closeModal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">
                                Nombre del Rol <span class="text-danger">*</span>
                            </label>
                            <input wire:model="form.name" type="text"
                                class="form-control @error('form.name') is-invalid @enderror"
                                placeholder="Ej: Administrador, Editor, Vendedor">
                            @error('form.name')
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
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });

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

            function initDataTable() {
                if ($.fn.DataTable.isDataTable('#rolesDataTable')) {
                    $('#rolesDataTable').DataTable().destroy();
                }
                $('#rolesDataTable').DataTable({
                    pageLength: 5,
                    lengthMenu: [5, 10, 25, 50, 100],
                });
            }

            document.addEventListener('livewire:initialized', () => {
                initDataTable();

                Livewire.hook('commit', ({
                    succeed
                }) => {
                    succeed(() => initDataTable());
                });

                Livewire.on('role-saved', () => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Rol guardado correctamente.'
                    });
                });

                Livewire.on('role-deleted', () => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Rol eliminado correctamente.'
                    });
                });
            });
        </script>
    @endpush
</div>

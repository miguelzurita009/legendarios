<div>
    @push('vendors-css')
        <link rel="stylesheet" href="{{ asset('vendors/css/dataTables.bs5.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/css/sweetalert2.min.css') }}">
    @endpush

    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Usuarios</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Usuarios</li>
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
                        <span>Crear Usuario</span>
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
                            <table id="exampleDataTable" class="table table-hover mb-0" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Nombre</th>
                                        <th>Teléfono</th>
                                        <th>Rol</th>
                                        <th>Creado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            {{-- strtoupper() convierte el texto a mayúsculas --}}
                                            <td>{{ strtoupper($user->apellido_paterno) }}</td>
                                            <td>{{ strtoupper($user->apellido_materno) }}</td>
                                            <td>{{ strtoupper($user->name) }}</td>
                                            <td>{{ $user->telefono }}</td>
                                            {{-- Rol: vacío por ahora, se completará con Spatie --}}
                                            <td>
                                                <span class="badge bg-secondary">Sin rol</span>
                                            </td>
                                            <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('users.show', $user) }}"
                                                        class="btn btn-sm btn-info">
                                                        <i class="fa-solid fa-eye me-1"></i>Ver
                                                    </a>
                                                    <button wire:click="openEditModal({{ $user->id }})"
                                                        class="btn btn-sm btn-warning">
                                                        <i class="fa-solid fa-pen-to-square me-1"></i>Editar
                                                    </button>
                                                    <button onclick="confirmDelete({{ $user->id }})"
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

    {{-- MODAL CREAR/EDITAR USUARIO --}}
    @if ($showModal)
        <div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,0.5);">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            {{ $form->user ? 'Editar Usuario' : 'Nuevo Usuario' }}
                        </h5>
                        <button type="button" class="btn-close" wire:click="closeModal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            {{-- Nombre --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nombre <span class="text-danger">*</span></label>
                                <input wire:model="form.name" type="text" style="text-transform: uppercase;"
                                    class="form-control @error('form.name') is-invalid @enderror"
                                    placeholder="Ingresa el nombre">
                                @error('form.name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Apellido Paterno --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Apellido Paterno <span class="text-danger">*</span></label>
                                <input wire:model="form.apellido_paterno" type="text"
                                    style="text-transform: uppercase;"
                                    class="form-control @error('form.apellido_paterno') is-invalid @enderror"
                                    placeholder="Ingresa el apellido paterno">
                                @error('form.apellido_paterno')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Apellido Materno --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Apellido Materno</label>
                                <input wire:model="form.apellido_materno" type="text"
                                    style="text-transform: uppercase;"
                                    class="form-control @error('form.apellido_materno') is-invalid @enderror"
                                    placeholder="Ingresa el apellido materno">
                                @error('form.apellido_materno')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- CI --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Carnet de Identidad <span class="text-danger">*</span></label>
                                <input wire:model="form.ci" type="text"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                    class="form-control @error('form.ci') is-invalid @enderror"
                                    placeholder="Ingresa el CI">
                                @error('form.ci')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Fecha de Nacimiento --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Fecha de Nacimiento <span class="text-danger">*</span></label>
                                <input wire:model="form.fecha_nacimiento" type="date"
                                    class="form-control @error('form.fecha_nacimiento') is-invalid @enderror">
                                @error('form.fecha_nacimiento')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Teléfono --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Teléfono <span class="text-danger">*</span></label>
                                <input wire:model="form.telefono" type="tel"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                    class="form-control @error('form.telefono') is-invalid @enderror"
                                    placeholder="Ingresa el teléfono">
                                @error('form.telefono')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input wire:model="form.email" type="email"
                                    class="form-control @error('form.email') is-invalid @enderror"
                                    placeholder="Ingresa el email">
                                @error('form.email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal">Cancelar</button>
                        <button type="button" class="btn btn-primary" wire:click="save"
                            wire:loading.attr="disabled">
                            <span wire:loading wire:target="save"
                                class="spinner-border spinner-border-sm me-1"></span>
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
                if ($.fn.DataTable.isDataTable('#exampleDataTable')) {
                    $('#exampleDataTable').DataTable().destroy();
                }
                $('#exampleDataTable').DataTable({
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

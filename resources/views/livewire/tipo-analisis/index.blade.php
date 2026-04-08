<div>
    @push('vendors-css')
        <link rel="stylesheet" href="{{ asset('vendors/css/dataTables.bs5.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/css/sweetalert2.min.css') }}">
    @endpush

    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Area Médica</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                <li class="breadcrumb-item">Tipos de Análisis</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                    <button wire:click="openCreateModal" class="btn btn-primary">
                        <i class="feather-plus me-2"></i>
                        <span>Crear Tipo</span>
                    </button>
                </div>
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
                                        <th>Nombre</th>
                                        <th>Creado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tipos as $tipo)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ strtoupper($tipo->nombre) }}</td>
                                            <td>{{ $tipo->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('tipo-analisis.show', $tipo) }}"
                                                        class="btn btn-sm btn-info">
                                                        <i class="fa-solid fa-eye me-1"></i>Ver
                                                    </a>

                                                    <button wire:click="openEditModal({{ $tipo->id }})"
                                                        class="btn btn-sm btn-warning">
                                                        <i class="fa-solid fa-pen-to-square me-1"></i>Editar
                                                    </button>

                                                    <button onclick="confirmDelete({{ $tipo->id }})"
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

    {{-- MODAL --}}
    @if ($showModal)
        <div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,0.5);">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            {{ $form->tipo ? 'Editar Tipo de Análisis' : 'Nuevo Tipo de Análisis' }}
                        </h5>
                        <button type="button" class="btn-close" wire:click="closeModal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nombre <span class="text-danger">*</span></label>
                            <input wire:model="form.nombre" type="text" style="text-transform: uppercase;"
                                class="form-control @error('form.nombre') is-invalid @enderror"
                                placeholder="Ingresa el nombre">

                            @error('form.nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal">
                            Cancelar
                        </button>

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

                Livewire.on('tipo-saved', () => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Tipo de análisis guardado correctamente.'
                    });
                });

                Livewire.on('tipo-deleted', () => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Tipo de análisis eliminado correctamente.'
                    });
                });
            });
        </script>
    @endpush
</div>

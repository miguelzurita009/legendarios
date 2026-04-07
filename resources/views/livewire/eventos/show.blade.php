<div>
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Detalle de Evento</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('eventos.index') }}">Eventos</a></li>
                <li class="breadcrumb-item">Detalle</li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card border-top-0">
                    <div class="card-body personal-info">
                        <div class="mb-4 d-flex align-items-center justify-content-between">
                            <h5 class="fw-bold mb-0 me-4">
                                <span class="d-block mb-2">Información del Evento:</span>
                                <span class="fs-12 fw-normal text-muted text-truncate-1-line">
                                    Detalles del evento organizado por Legendarios.
                                </span>
                            </h5>
                        </div>

                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-4">
                                <label class="fw-semibold">Fecha del Evento: </label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control"
                                    value="{{ \Carbon\Carbon::parse($evento->fecha)->format('d/m/Y') }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-4">
                                <label class="fw-semibold">Capacidad: </label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" value="{{ $evento->capacidad }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-4">
                                <label class="fw-semibold">Estado: </label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" value="{{ ucfirst($evento->estado) }}"
                                    readonly>
                            </div>
                        </div>

                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-4">
                                <label class="fw-semibold">Fecha de Registro: </label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control"
                                    value="{{ $evento->created_at->format('d/m/Y H:i') }}" readonly>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <a href="{{ route('eventos.index') }}" class="btn btn-secondary">
                                <i class="feather-arrow-left me-2"></i>Volver
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

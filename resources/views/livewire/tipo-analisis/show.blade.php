<div>

    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Detalle Tipo de Análisis</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('tipo-analisis.index') }}">Tipos de Análisis</a>
                </li>
                <li class="breadcrumb-item">Detalle</li>
            </ul>
        </div>

        <div class="page-header-right ms-auto">
            <a href="{{ route('tipo-analisis.index') }}" class="btn btn-secondary">
                <i class="feather-arrow-left me-2"></i>
                Volver
            </a>
        </div>
    </div>

    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card stretch stretch-full">
                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">ID</label>
                                <p>{{ $tipo->id }}</p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Nombre</label>
                                <p>{{ strtoupper($tipo->nombre) }}</p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Fecha de creación</label>
                                <p>{{ $tipo->created_at->format('d/m/Y H:i') }}</p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Última actualización</label>
                                <p>{{ $tipo->updated_at->format('d/m/Y H:i') }}</p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

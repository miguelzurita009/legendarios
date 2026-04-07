<div>
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Detalle de Usuario</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios</a></li>
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
                                <span class="d-block mb-2">Información Personal:</span>
                                <span class="fs-12 fw-normal text-muted text-truncate-1-line">Detalles del perfil del
                                    usuario registrado.</span>
                            </h5>

                        </div>
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-4">
                                <label class="fw-semibold">Avatar: </label>
                            </div>
                            <div class="col-lg-8">
                                <div class="mb-4 mb-md-0 d-flex gap-4 your-brand">
                                    <div
                                        class="wd-100 ht-100 position-relative overflow-hidden border border-gray-2 rounded">
                                        <img src="{{ asset('images/avatar/1.png') }}"
                                            class="upload-pic img-fluid rounded h-100 w-100" alt="">
                                        <div
                                            class="position-absolute start-50 top-50 end-0 bottom-0 translate-middle h-100 w-100 hstack align-items-center justify-content-center c-pointer upload-button">
                                            <i class="feather feather-camera" aria-hidden="true"></i>
                                        </div>
                                        <input class="file-upload" type="file" accept="image/*">
                                    </div>
                                    <div class="d-flex flex-column gap-1">
                                        <div class="fs-11 text-gray-500 mt-2"># Imagen de perfil</div>
                                        <div class="fs-11 text-gray-500"># Tamaño recomendado 150x150</div>
                                        <div class="fs-11 text-gray-500"># Formatos: png, jpg, jpeg</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-4">
                                <label for="fullnameInput" class="fw-semibold">Name: </label>
                            </div>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="feather-user"></i></div>
                                    <input type="text" class="form-control" id="fullnameInput"
                                        value="{{ $user->name }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-4">
                                <label class="fw-semibold">Apellido Paterno: </label>
                            </div>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="feather-user"></i></div>
                                    <input type="text" class="form-control" value="{{ $user->apellido_paterno }}"
                                        readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-4">
                                <label class="fw-semibold">Apellido Materno: </label>
                            </div>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="feather-user"></i></div>
                                    <input type="text" class="form-control" value="{{ $user->apellido_materno }}"
                                        readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-4">
                                <label class="fw-semibold">CI: </label>
                            </div>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="feather-credit-card"></i></div>
                                    <input type="text" class="form-control" value="{{ $user->ci }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-4">
                                <label class="fw-semibold">Teléfono: </label>
                            </div>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="feather-phone"></i></div>
                                    <input type="text" class="form-control" value="{{ $user->telefono }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-4">
                                <label for="mailInput" class="fw-semibold">Email: </label>
                            </div>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="feather-mail"></i></div>
                                    <input type="text" class="form-control" id="mailInput"
                                        value="{{ $user->email }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-4">
                                <label class="fw-semibold">Fecha de Nacimiento: </label>
                            </div>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="feather-calendar"></i></div>
                                    <input type="text" class="form-control"
                                        value="{{ $user->fecha_nacimiento ? \Carbon\Carbon::parse($user->fecha_nacimiento)->format('d/m/Y') : '' }}"
                                        readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-4">
                                <label class="fw-semibold">Fecha de Registro: </label>
                            </div>
                            <div class="col-lg-8">
                                <div class="input-group">
                                    <div class="input-group-text"><i class="feather-calendar"></i></div>
                                    <input type="text" class="form-control"
                                        value="{{ $user->created_at->format('d/m/Y H:i') }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">
                                <i class="feather-arrow-left me-2"></i>Volver
                            </a>
                            {{--
                            <a href="{{ route('users.index') }}" class="btn btn-primary">
                                <i class="feather-edit me-2"></i>Editar Información
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

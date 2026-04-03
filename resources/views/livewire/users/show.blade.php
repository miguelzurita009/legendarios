<div>
    <div class="container-fluid py-4">

        {{-- Encabezado --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">Detalle del Usuario</h4>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">
                ← Volver
            </a>
        </div>

        <div class="card" style="max-width: 700px;">
            <div class="card-body">
                <table class="table mb-0">
                    <tr>
                        <th width="150">ID</th>
                        <td>{{ $user->id }}</td>
                    </tr>
                    <tr>
                        <th>Nombre</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Creado</th>
                        <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('users.index') }}" class="btn btn-secondary">← Volver</a>
            <a href="{{ route('users.index') }}" onclick="history.back(); return false;" class="btn btn-warning">
                Editar
            </a>
        </div>

    </div>
</div>

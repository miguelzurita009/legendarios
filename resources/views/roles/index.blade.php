@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Roles</h2>

    <button class="btn btn-primary mb-3" id="btnAdd">Agregar Rol</button>

    <table class="table" id="rolesTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="roleModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="roleForm">
                @csrf
                <input type="hidden" id="role_id">

                <div class="modal-header">
                    <h5 class="modal-title">Rol</h5>
                </div>

                <div class="modal-body">
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre">
                </div>

                <div class="modal-footer">
                    <button class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>
let table;

$(function () {

    table = $('#rolesTable').DataTable({
        ajax: "{{ route('roles.data') }}",
        columns: [
            { data: 'id' },
            { data: 'nombre' },
            {
                data: null,
                render: function (data) {
                    return `
                        <button onclick="edit(${data.id})" class="btn btn-warning btn-sm">Editar</button>
                        <button onclick="del(${data.id})" class="btn btn-danger btn-sm">Eliminar</button>
                    `;
                }
            }
        ]
    });

    $('#btnAdd').click(() => {
        $('#roleForm')[0].reset();
        $('#role_id').val('');
        $('#roleModal').modal('show');
    });

    $('#roleForm').submit(function(e){
        e.preventDefault();

        let id = $('#role_id').val();
        let url = id ? `/roles/${id}` : `/roles`;
        let method = id ? 'PUT' : 'POST';

        $.ajax({
            url: url,
            type: method,
            data: $(this).serialize(),
            success: function () {
                $('#roleModal').modal('hide');
                table.ajax.reload();
            }
        });
    });

});

function edit(id){
    $.get(`/roles/${id}/edit`, function(data){
        $('#role_id').val(data.id);
        $('#nombre').val(data.nombre);
        $('#roleModal').modal('show');
    });
}

function del(id){
    if(confirm('¿Eliminar?')){
        $.ajax({
            url: `/roles/${id}`,
            type: 'DELETE',
            data: {_token: '{{ csrf_token() }}'},
            success: function(){
                table.ajax.reload();
            }
        });
    }
}
</script>
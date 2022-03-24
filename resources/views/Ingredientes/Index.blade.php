
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col mt-4">
        <a href="/Ingredientes/Create">
            <button type="button" class="btn custom-btn">
                
            <span> Create</span>
            </button>
        </a>
    </div>
    <div class="col-12 pt-3">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <span> ingredient</span>
            </div>
                @include('flash::message')
            <div class="card-body">
                <table id="tbl_ingredient" class=" text-center table" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Imagen</th>      
                            <th>Name</th>
                            <th>Clasification</th>
                            <th>Description</th>
                            <th>Cant</th>
                            <th>Fecha creacion</th>
                            <th>State</th>
                            <th>Edit</th>
                            <th>Shange State</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div> 
    </div> 
</div>

@endsection


@section('JS')
<script>

// Swal.fire(
//   'Good job!',
//   'You clicked the button!',
//   'success'
// )

$('#tbl_ingredient').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/Ingredientes/Listar',
        columns: [
            {data: 'Imagen', name: 'Imagen', orderable: false, searchable: false},
            {data: 'Nombre', name: 'Nombre'},
            {data: 'Nombre_Clasificacion', name: 'Nombre_Clasificacion'},
            {data: 'Descripcion', name: 'Descripcion'},
            {data: 'Cantidad', name: 'Cantidad'},
            {data: 'created_at', name: 'created_at'},
            {data: 'Estado', name: 'Estado'},
            {data: 'editar', name: 'editar', orderable: false, searchable: false},
            {data: 'cambiar', name: 'cambiar', orderable: false, searchable: false}
        ]
    });
</script>
@endsection

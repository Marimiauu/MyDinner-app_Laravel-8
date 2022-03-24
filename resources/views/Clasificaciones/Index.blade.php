
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col mt-4">
        <a href="/Clasificaciones/Create">
            <button type="button" class="btn custom-btn">
            <span> Create</span>
            </button>
        </a>
    </div>
    <div class="col-12 pt-3">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <span> Clasification</span>
            </div>
                @include('flash::message')
            <div class="card-body">
                <table id="tbl_Clasification" class=" text-center table" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Name</th>
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

$('#tbl_Clasification').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/Clasificaciones/Listar',
        columns: [
            {data: 'Nombre_Clasificacion', name: 'Nombre_Clasificacion'},
            {data: 'Estado', name: 'Estado'},
            {data: 'editar', name: 'editar', orderable: false, searchable: false},
            {data: 'cambiar', name: 'cambiar', orderable: false, searchable: false}
        ]
    });
</script>
@endsection

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
            <div class="card-body">
                <div class="row mt-2">
                    <div class="col">
                        <div class="table-responsive">
                            <table  id="tbl_Clasification"  class="table table-bordered table-striped table-hover" cellpadding="0" >
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
        </div> 
    </div> 
</div>

@endsection


@section('JS')
<script>

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
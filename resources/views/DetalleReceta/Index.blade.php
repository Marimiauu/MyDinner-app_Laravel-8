
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col mt-4">
        <a href="/DetalleReceta/Create">
            <button type="button" class="btn custom-btn">
            <span> Create</span>
            </button>
        </a>
    </div>
    <div class="col-12 pt-3">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <span> Recipe</span>
            </div>
                @include('flash::message')
            <div class="card-body">
                <table id="" class=" text-center table" style="width: 100%">
                    <thead>
                        <tr>
                            <th>#</th>      
                            <th>Name</th>
                            <th>Ingredients Quantity</th>
                            <th>Shange State</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Recipes as $value)
                        <tr>
                            <td>{{$value->Id_Recipe}}</td>
                            <td>{{$value->Nombre_R}}</td>
                            <td>{{$value->Cantidad_Ing}}</td>
                            <td>
                                <a class="btn btn-outline-info btn-sm" href="/DetalleReceta?Id={{$value->Id_Recipe}}">See ingredients</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> 
    </div> 
    
    @if(count($producto) > 0) 
    <div class="col-12 pt-3">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    <span> Ingredients</span>
                </div>
                    @include('flash::message')
                <div class="card-body">
                    <table id="tbl_ingredient" class=" text-center table" style="width: 100%">
                        <thead>
                                <tr>
                                    <th colspan="3" class="text-center">Ingredients</th>
                                
                                </tr>
                                <tr>
                                    <th>Name </th>
                                    <th>Description</th>
                                    <th>Quanty</th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach($Ing as $value)
                                <tr>
                                    <td>{{$value->Nombre}}</td>
                                    <td>{{$value->Descripcion}}</td>
                                    <td>{{$value->Cantidad}}</td>
                                </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div> 
        </div> 
    @endif
</div>



   

@endsection


@section('JS')
@endsection


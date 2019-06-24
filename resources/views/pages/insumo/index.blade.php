@extends('layouts.dashboard')
@section('titulo', 'Gestión de Bodega')
@section('contenido')


<div class="row" id="">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        @include('pages.insumo.searchInsumo')
    </div>
</div>

<div class="row my-2">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="container-fluid">
                    <h1 class="sub-title">Lista de insumos</h1>
                    
                    <table class="table table-borderless table-responsive-sm text-center ">
                        <thead>
                            <tr>
                            <th class="table-title">ID</th>
                                <th class="table-title">Nombre</th>
                                <th class="table-title">Categoria</th>
                                <th class="table-title">Codigo</th>
                                <th class="table-title">Cantidad</th>
                                <th class="table-title">Descripción</th>
                                <th class="">
                                    <a href="{{ url('/admin-profile/create') }}" class="btn btn-success btn-sm mt-0"><i class="fas fa-plus"></i> Agregar
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                                @foreach ($insumos as $insumo)
                                    <tr>
                                        <td class="table-text align-baseline" style="width: 100px">{{ $insumo->idinsumo }} </td>
                                        <td class="table-text align-baseline">{{ $insumo->nombre }} </td>      
                                        @foreach ($categorias as $categoria) 

                                            @if ( $categoria->idcategoria == $insumo->idcategoria )
                                                <td class="table-text align-baseline">{{ $categoria->nombre }} </td>                                            
                                            @endif  

                                        @endforeach                                                                                                   
                                        <td class="table-text align-baseline">{{ $insumo->codigo }} </td>
                                        <td class="table-text align-baseline">{{ $insumo->stock }} </td>
                                        <td class="table-text align-baseline">{{ $insumo->descripcion }} </td>
                                        <td class="align-baseline" id="">
                                        <a href="{{ URL::action('InsumoController@edit', $insumo->idinsumo ) }}" class="btn cyan white-text" id="btn-aceptar">Editar</a> 
                                        <a href="" data-target="#modal-delete-{{$insumo->idinsumo}}" data-toggle="modal" class="btn red white-text" id="btn-aceptar">Eliminar</a> 
                                        </td>
                                    </tr>
                                @include('pages.insumo.modal')
                                @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5"></td>
                            </tr>
                        </tfoot>    
                    </table>            
                </div>
                {{ $insumos->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
</div>


@endsection 
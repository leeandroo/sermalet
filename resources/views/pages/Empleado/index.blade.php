@extends('layouts.dashboard')
@section('titulo', 'Gestión de Empleados')
@section('contenido')

<div class="row">
    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
        
    <form action="{{ url('pages/empleado') }}" autocomplete="off" method="GET" role="search">
    <div class="form-group mt-4 ml-2">
        <div class="input-group">
            <input type="text" class="form-control" name="searchText" placeholder="Buscar...." value="">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary btn-md mt-0">Buscar</button>
            </span>
        </div>
    </div>
    </form>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card mt-4 ml-2 mr-2">
            <div class="card-body">
                <div class="container-fluid">


                    <div class="row">
                        <h1 class="sub-title">Lista de Empleados</h1>
                        <button class="btn green white-text" id="btn-aceptar">Agregar Empleado</button>
                    </div>
                    
                    
                    
                    <table class="table table-borderless table-responsive-sm ">
                        <thead>
                            <tr>
                                <th class="table-title">Rut</th> 
                                <th class="table-title">Nombre</th>
                                <th class="table-title">Cargo</th>
                                <th class="table-title">Depto</th>
                                {{-- <th class="table-title">Valor Hora</th>
                                <th class="table-title">Tipo Empleado</th> --}}
                                <th class="table-title">Estado</th>
                                <th class="table-title">Opciones</th>
                            </tr>
                        </thead>
                        <tbody >
                                
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5"></td>
                            </tr>
                        </tfoot>    
                    </table>              
                </div>
                
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            @include('pages.empleado.create')
    </div>
</div>
@endsection 
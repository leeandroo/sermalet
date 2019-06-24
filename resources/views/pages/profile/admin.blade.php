@extends('layouts.dashboard')
@section('titulo', 'Perfil de administrador')
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card mt-4">
            <div class="card-body">
                <div class="container-fluid">
                    <h1 class="sub-title mb-3">Nuevas solicitudes</h1>
                    @if($citas->count() > 0)
                        <table class="table table-borderless table-responsive-sm ">
                            <thead>
                                <tr>
                                    <th class="table-title">Solicitate</th>
                                    <th class="table-title">Servicio</th>
                                    <td class="table-title">Descripción</td>
                                    <th class="table-title">Whatsapp habilitado</th>
                                    <th class="table-title">Opciones</th>
                                </tr>
                            </thead>
                            <tbody >
                                @foreach($citas as $cita)
                                    @if($cita->estado_cita == "Nueva")
                                        <tr>
                                            <td class="table-text align-baseline">{{ $cita->name.' '.$cita->lastname }} </td>
                                            <td class="table-text align-baseline">{{ $cita->servicio}} </td>
                                            @if($cita->descripcion == NULL)
                                                <td class="table-text align-baseline">Sin descripción</td>
                                            @else
                                                <td class="table-text align-baseline">{{ $cita->descripcion }} </td>
                                            @endif
                                            
                                            @if($cita->estado_whatsapp == 1)
                                                <td class="table-text align-baseline">Si </td>
                                            @else
                                                <td class="table-text align-baseline">No</td>
                                            @endif

                                            <td class="align-baseline">
                                                <a href="#!" class="btn btn-sm cyan white-text" data-target="#modal-{{$cita->idcita}}" data-toggle="modal">Agendar</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                @include('pages.agenda.schedule')
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5">{{ $citas->links('vendor.pagination.bootstrap-4') }}</td>
                                </tr>
                            </tfoot>    
                        </table>
                    @else
                        <blockquote class="blockquote bq-info">
                            <p class="bq-title">No hemos encontrado registros</p>
                            <p>
                                Los registros del sistema no lograron encontrar nuevas solicitudes.
                            </p>
                        </blockquote>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-5">
    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
        <div class="card mt-4">
            <div class="card-body">
                <div class="container-fluid">
                    <h1 class="sub-title mb-3">Citas agendadas</h1>
                    @if($citas->count() > 0)
                        
                        @foreach ($citas as $cita)
                            @if($cita->estado_cita == "Agendada")
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h6 class="card-title grey-text">
                                            <b>N° de solicitud:</b> {{$cita->idcita}}
                                            <i class="fas fa-edit grey-text float-right"></i> 
                                        </h6>
                                        <p class="card-text mb-0"><b>Servicio:</b> {{$cita->servicio}}</p>
                                        @if($cita->descripcion == NULL)
                                            <p class="card-text"><b>Descripción:</b> Sin descripción</p>
                                        @else
                                            <p class="card-text"><b>Descripción:</b> {{$cita->descripcion}}</p>
                                        @endif
                                        
                                        <a href="#!" class="btn btn-sm float-center btn-danger w-30 m-0">Cancelar</a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <div colspan="5">{{ $citas->links('vendor.pagination.bootstrap-4') }}</div>
                    @else
                        <blockquote class="blockquote bq-info">
                            <p class="bq-title">No hemos encontrado registros</p>
                            <p>
                                No se han agendado nuevas citas en el sistema.
                            </p>
                        </blockquote>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
        <div class="card mt-4">
            <div class="card-body">
                <div class="container-fluid">
                    <h1 class="sub-title align-baseline mb-3">
                        
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
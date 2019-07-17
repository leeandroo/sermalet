@extends('layouts.dashboard')
@section('page-title', 'Gestión de citas')
@section('title', 'Control de citas')
@section('citas', 'active-item')
@section('contenido')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card mt-4">
        <div class="card-body">
            <div class="container-fluid">
                <p class="page-subtitle mb-4 text-center">Nuevas solicitudes</p>
    
                @if($citas_agendadas->count() > 0)
                    @foreach($citas_nuevas as $cita)
                        <div class="card mb-3">
                            <div class="card-body p-0">
                                <div class="card-header grey lighten-5">
                                    <div class="row">
                                        <div class="col-12 col-xs-12 text-center">
                                            <p class="page-subtitle black-text mb-0 mt-2">
                                                <b>Número de solicitud:</b>
                                                <span class="black-text">{{ $cita->idcita }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ml-0 mr-0 mt-4">
                                    <div class="col-6 col-lg-3 text-center mb-3">
                                        <div>
                                            <i class="fas fa-toolbox fa-2x yellow-text mb-2"></i>
                                        </div>
                                        <p class="card-text black-text"> 
                                            <b>Servicio </b> <br>
                                            <span class="grey-text">{{ $cita->servicio }}</span>
                                        </p>
                                    </div>
                                    <div class="col-6 col-lg-3 text-center mb-3">
                                        <div>
                                            <i class="fas fa-user-alt fa-2x blue-text mb-2"></i>
                                        </div>
                                        <p class="card-text black-text"> 
                                            <b>Cliente</b> <br>
                                            <span class="grey-text">{{ $cita->name.' '.$cita->lastname }}</span>
                                        </p>
                                    </div>
                                    <div class="col-6 col-lg-3 text-center">
                                        <div>
                                            <i class="fas fa-file-contract fa-2x green-text mb-2"></i>
                                        </div>
                                        <p class="card-text black-text"> 
                                            <b>Descripción</b> <br>
                                            @if($cita->descripcion == NULL)
                                            <span class="grey-text">Sin descripción</span>
                                            @else
                                            <span class="grey-text">{{ $cita->descripcion }}</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-6 col-lg-3 text-center">
                                        <div>
                                            <i class="fas fa-map fa-2x red-text mb-2"></i>
                                        </div>
                                        <p class="card-text black-text"> 
                                            <b>Lugar de atención</b> <br>
                                            <span class="grey-text">{{ $cita->direccion }}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="card-footer white border-0">
                                    <div class="row">
                                        <div class="col-12 col-xs-12 text-center p-0">
                                            <button type="button" class="btn btn-sm btn-round cyan btn-rounded waves-effect m-0" data-target="#modal-{{$cita->idcita}}" data-toggle="modal">Agendar cita</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('pages.agenda.schedule')
                    @endforeach
                @else
                    <blockquote class="blockquote bq-warning">
                        <p class="bq-title">No posee citas agendadas</p>
                        <p>
                            Despues de realizar su solicitud estas quedan pendientes de su confirmación y que se les asigne personal, fechas y horarios.
                        </p>
                    </blockquote>
                @endif
                @include('pages.agenda.create')
            </div>
        </div>
    </div>
</div>
<div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 mb-3">
    <div class="card mt-4">
        <div class="card-body">
            <div class="container-fluid">
                
                @if($citas_agendadas->count() > 0)
                    <p class="page-subtitle mb-3 text-center">
                        Solicitudes agendadas
                    </p>

                    @foreach ($citas_agendadas as $cita)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h6 class="card-title grey-text">
                                    <b>Detalle de solicitud:</b>
                                    <i class="fas fa-edit grey-text float-right"></i> 
                                </h6>
                                <ul>
                                    <li>
                                        <p class="card-text mb-0"><b>Servicio:</b> {{$cita->servicio}}</p>
                                    </li>
                                    <li>
                                         <p class="card-text mb-3"><b>Cliente:</b> {{$cita->nombre_cliente.' '.$cita->apellido_cliente}}</p>
                                    </li>
                                </ul>
                               
                                <h6 class="card-title grey-text">
                                    <b>Detalle de atención:</b>
                                </h6>
                                <ul>
                                   <li>
                                        <p class="card-text mb-0"><b>Fecha:</b> {{$cita->fecha}}</p>
                                   </li>
                                   <li>
                                        <p class="card-text mb-0"><b>Hora:</b> {{$cita->hora_inicio.' hrs'}}</p>
                                   </li>
                                   <li>
                                        <p class="card-text mb-0"><b>Responsable:</b> {{$cita->nombre_empleado.' '.$cita->apellido_empleado}}</p>
                                   </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                    
                    <div colspan="5">{{ $citas_nuevas->links('vendor.pagination.bootstrap-4') }}</div>
                @else
                    <blockquote class="blockquote bq-warning">
                        <p class="bq-title">No tiene nuevas solicitudes</p>
                        <p>
                            Una vez realice una nueva solicitud estas aparaceran aquí.
                        </p>
                    </blockquote>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
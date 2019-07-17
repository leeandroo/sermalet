@extends('layouts.dashboard')
@section('page-title', 'Mis citas')
@section('title', 'Mi citas')
@section('citas', 'active-item')
@section('boton-agregar')
<button class="btn btn-success btn-sm btn-rounded m-0 float-right" data-target="#modalCita" data-toggle="modal">
    <i class="fas fa-plus"></i> Nueva cita
</button>
@endsection
@section('contenido')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card mt-4">
        <div class="card-body">
            <div class="container-fluid">
                <p class="page-subtitle mb-4 text-center">Agendadas</p>
    
                @if($citas_agendadas->count() > 0)
                    <div class="card">
                        <div class="card-body p-0">
                            
                            @foreach($citas_agendadas as $cita)
                                <div class="row ml-0 mr-0 mt-4 mb-1">
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
                                            <i class="fas fa-calendar-day fa-2x blue-text mb-2"></i>
                                        </div>
                                        <p class="card-text black-text"> 
                                            <b>Fecha cita</b> <br>
                                            <span class="grey-text">{{ $cita->fecha }}</span>
                                        </p>
                                    </div>
                                    <div class="col-6 col-lg-3 text-center mb-3">
                                        <div>
                                            <i class="fas fa-clock fa-2x green-text mb-2"></i>
                                        </div>
                                        <p class="card-text black-text"> 
                                            <b>Hora atención</b> <br>
                                            <span class="grey-text">{{ $cita->hora_inicio }}</span>
                                        </p>
                                    </div>
                                    <div class="col-6 col-lg-3 text-center mb-3">
                                        <div>
                                            <i class="fas fa-id-card fa-2x red-text mb-2"></i>
                                        </div>
                                        <p class="card-text black-text"> 
                                            <b>Responsable</b> <br>
                                            <span class="grey-text">{{ $cita->name.' '.$cita->lastname }}</span>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
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
                
                @if($citas_nuevas->count() > 0)
                    <p class="page-subtitle mb-3 text-center">
                        Nuevas solicitudes
                    </p>

                    @foreach ($citas_nuevas as $cita)
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
                                
                                <a href="{{ url("/cancelar/{$cita->idcita}") }}" class="btn btn-sm float-center btn-danger w-30 m-0">Cancelar</a>
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
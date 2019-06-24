@extends('layouts.dashboard')
@section('titulo', 'Perfil de usuario')
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card mt-4">
            <div class="card-body">
                <div class="container-fluid">
                    <h1 class="sub-title mb-3">Citas agendadas</h1>
                    @if($citas->count() > 0)
                        
                    @else
                        <blockquote class="blockquote bq-warning">
                            <p class="bq-title">No posee citas agendadas</p>
                            <p>
                                Despues de realizar su solicitud estas quedan pendientes de su confirmación y que se les asigne personal, fechas y horarios.
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
                    
                    @if($citas->count() > 0)
                        <h1 class="sub-title align-baseline mb-3">
                            Nuevas solicitudes
                        </h1>

                        @foreach ($citas as $cita)
                            @if($cita->estado_cita == "Nueva")
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
                            @endif
                        @endforeach
                        
                        <div colspan="5">{{ $citas->links('vendor.pagination.bootstrap-4') }}</div>
                        
                    @else
                        <blockquote class="blockquote bq-warning">
                            <p class="bq-title">No tiene nuevas solicitudes</p>
                            <p>
                                Una vez realice una nueva solicitud estas aparaceran aquí.
                            </p>
                        </blockquote>
                    @endif
                    @include('pages.agenda.create')
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
        <div class="card mt-4">
            <div class="card-body">
                <div class="container-fluid">
                    <h1 class="sub-title align-baseline mb-3">
                        Documentos
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
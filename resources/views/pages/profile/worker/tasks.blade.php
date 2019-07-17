@extends('layouts.dashboard')
@section('page-title', 'Tareas asignadas')
@section('title', 'Tareas asignadas')
@section('tareas', 'active-item')
@section('contenido')

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card mt-4">
        <div class="card-body">
            <div class="container-fluid">
                <p class="page-subtitle mb-3 text-center">Servicios asignados</p>
                @if($citas->count() > 0)
                    <table class="table table-borderless table-responsive-sm ">
                        <thead>
                            <tr>
                                <th class="table-title">Solicitate</th>
                                <th class="table-title">Servicio</th>
                                <td class="table-title">Descripción</td>
                                <th class="table-title">Fecha</th>
                                <th class="table-title">Hora</th>
                                <th class="table-title">Opciones</th>
                            </tr>
                        </thead>
                        <tbody >
                            @foreach($citas as $cita)
                                <tr>
                                    <td class="table-text align-baseline">{{ $cita->name.' '.$cita->lastname }} </td>
                                    <td class="table-text align-baseline">{{ $cita->servicio}} </td>
                                    @if($cita->descripcion == NULL)
                                        <td class="table-text align-baseline">Sin descripción</td>
                                    @else
                                        <td class="table-text align-baseline">{{ $cita->descripcion }} </td>
                                    @endif

                                    <td class="table-text align-baseline">{{ $cita->fecha }}</td>
                                    <td class="table-text align-baseline">{{ $cita->hora_inicio }}</td>
                                    <td class="align-baseline">
                                        <a href="{{ url("/details/{$cita->idorden_trabajo}") }}" class="btn btn-sm btn-rounded cyan white-text">Detalle</a>
                                    </td>
                                </tr>
                            @endforeach
                            
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

@endsection
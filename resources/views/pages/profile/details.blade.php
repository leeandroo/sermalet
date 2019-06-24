@extends('layouts.dashboard')
@section('titulo', 'Detalles')
@section('contenido')
<div class="row">
    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
        <div class="card mt-4">
            <!-- <div class="view overlay text-center align-baseline">
                <i class="fas fa-user-circle cyan-text mr-1 fa-6x m-4"></i>
                <a href="#!">
                <div class="mask rgba-white-slight"></div>
                </a>
            </div> -->
            <div class="card-body">
                <div class="container-fluid">
                    @if($ot->count() > 0)
                        <h1 class="sub-title mb-3 align-baseline mt-2">Información del cliente</h1>
                        @foreach($ot as $info)
                            <p class="card-text"><i class="fas fa-signature cyan-text fa-fw"></i> <b>Nombre:</b> {{ $info->name.' '.$info->lastname }}</p>
                            <p class="card-text"><i class="far fa-id-card cyan-text fa-fw"></i> <b>RUT: </b> {{ $info->rut }}</p>
                            <p class="card-text"><i class="fas fa-map-marker-alt cyan-text fa-fw"></i> <b>Dirección: </b> {{ $info->direccion }}</p>
                            <p class="card-text"><i class="fas fa-user-tie cyan-text fa-fw"></i> <b>Tipo de cliente: </b> {{$info->tipo_cliente }}</p>
                        @endforeach
                        <h1 class="sub-title mb-3 align-baseline">Información de contacto</h1>
                        @foreach($ot as $contacto)
                            <p class="card-text"><i class="fas fa-envelope cyan-text fa-fw"></i> <b>Correo: </b> {{$contacto->email }}</p>
                            <p class="card-text"><i class="fas fa-mobile-alt cyan-text fa-fw"></i> <b>Telefono: </b>{{ $contacto->telefono }}</p>
                            @if($contacto->estado_whatsapp == 1)
                                <p class="card-text mb-4"><i class="fab fa-whatsapp cyan-text fa-fw"></i> <b>Whastapp habilitado: </b>SI</p>
                            @else
                                <p class="card-text mb-4"><i class="fab fa-whatsapp cyan-text fa-fw"></i> <b>Whastapp habilitado: </b>No</p>
                            @endif
                        @endforeach
                    @else
                        <blockquote class="blockquote bq-info">
                            <p class="bq-title">No hemos encontrado registros</p>
                            <p>z
                                Los registros del sistema no lograron encontrar nuevas solicitudes.
                            </p>
                        </blockquote>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-4">
                    <!-- <div class="view overlay text-center align-baseline">
                        <i class="fas fa-user-circle cyan-text mr-1 fa-6x m-4"></i>
                        <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                        </a>
                    </div> -->
                    <div class="card-body">
                        <div class="container-fluid">
                            @if($ot->count() > 0)
                                <h1 class="sub-title align-baseline">Descripción del servicio:</h1>
                                @foreach($ot as $cita)
                                    <h5 class="grey-text mb-0">
                                        {{ $cita->descripcion }}
                                        <a href="{{ url("/descargar/{$cita->idorden_trabajo}") }}" class="btn btn-sm cyan white-text m-0 float-right">Descargar OT</a>
                                    </h5>
                                @endforeach
                            @else
                                <blockquote class="blockquote bq-info">
                                    <p class="bq-title">No hemos encontrado registros</p>
                                    <p>z
                                        Los registros del sistema no lograron encontrar nuevas solicitudes.
                                    </p>
                                </blockquote>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card mt-4">
                    <!-- <div class="view overlay text-center align-baseline">
                        <i class="fas fa-user-circle cyan-text mr-1 fa-6x m-4"></i>
                        <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                        </a>
                    </div> -->
                    <div class="card-body">
                        <div class="container-fluid">
                            @if($ot->count() > 0)
                                <h1 class="sub-title align-baseline">Detalles del servicio</h1>
                                <table class="table table-responsive-sm ">
                                    <thead>
                                        <tr>
                                            <th class="table-title">Servicio</th>
                                            <th class="table-title">Fecha</th>
                                            <th class="table-title">Hora</th>
                                            <th class="table-title">Precio</th>
                                            <th class="table-title">Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ot as $ot)
                                            <tr>
                                                <td class="table-text align-baseline">{{ $ot->servicio }}</td>
                                                <td class="table-text align-baseline">{{ $ot->fecha }}</td>
                                                <td class="table-text align-baseline">{{ $ot->hora_inicio.' hrs' }}</td>
                                                <td class="table-text align-baseline">{{ '$'.$ot->precio }}</td>
                                                <td class="table-text align-baseline">{{ $ot->estado }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="table-text align-baseline text-right">
                                                    <a href="{{ url("/iniciar/{$ot->idorden_trabajo}") }}" class="btn btn-sm success-color white-text">Inciar trabajo</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <blockquote class="blockquote bq-info">
                                    <p class="bq-title">No hemos encontrado registros</p>
                                    <p>z
                                        Los registros del sistema no lograron encontrar nuevas solicitudes.
                                    </p>
                                </blockquote>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @if($ot->estado == "En proceso")
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <div class="card mt-4">
                <!-- <div class="view overlay text-center align-baseline">
                    <i class="fas fa-user-circle cyan-text mr-1 fa-6x m-4"></i>
                    <a href="#!">
                    <div class="mask rgba-white-slight"></div>
                    </a>
                </div> -->
                <div class="card-body">
                    <div class="container-fluid">
                        <h1 class="sub-title mb-3 align-baseline mt-2">Agregar tareas anexas</h1>
                        <form class="align-items-center" style="color: #757575;" action="{{ url("/agregar/tareas/{$ot->idorden_trabajo}") }}" method="POST" class="needs-validation">
                            {!! csrf_field() !!}
                            <input type="hidden" class="form-control" name="idorden" value="{{ $ot->idorden_trabajo }}">
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label for="tarea" class="mt-1 mb-3 box-label">Tarea</label>
                                        <input type="text" class="form-control" name="tarea">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-3">
                                        <label for="descripcion">Descripción</label>
                                        <textarea name="descripcion" class="form-control rounded-0" type="text" rows="4"></textarea>
                                    </div>	
                                </div>
                            </div>
                            <div class="md-for m-0 text-right" id="btnformulario">
                                <button type="submit" class="btn cyan white-text" id="btn-aceptar">Agregar <i class="fa fa-paper-plane ml-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <div class="card mt-4">
                <!-- <div class="view overlay text-center align-baseline">
                    <i class="fas fa-user-circle cyan-text mr-1 fa-6x m-4"></i>
                    <a href="#!">
                    <div class="mask rgba-white-slight"></div>
                    </a>
                </div> -->
                <div class="card-body">
                    <div class="container-fluid">
                        <h1 class="sub-title mb-3 align-baseline mt-2">Tareas agregadas</h1>
                        @if($tareas->count() > 0)
                        <table class="table table-responsive-sm ">
                            <thead>
                                <tr>
                                    <th class="table-title">Tarea</th>
                                    <th class="table-title">Descripción</th>
                                    <th class="table-title">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tareas as $tarea)
                                    <tr>
                                        <td class="table-text align-baseline">{{ $tarea->nombre }}</td>
                                        <td class="table-text align-baseline">{{ $tarea->descripcion }}</td>
                                        <td colspan="5" class="table-text align-baseline text-right">
                                            <a href="{{ url("/eliminar/tareas/{$ot->idorden_trabajo}") }}" class="btn btn-sm danger-color white-text">Eliminar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <blockquote class="blockquote bq-warning">
                                <p class="bq-title">No se han agregado tareas</p>
                                <p>
                                    Despues de realizar su solicitud estas quedan pendientes de su confirmación y que se les asigne personal, fechas y horarios.
                                </p>
                            </blockquote>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <div class="card mt-4">
                <!-- <div class="view overlay text-center align-baseline">
                    <i class="fas fa-user-circle cyan-text mr-1 fa-6x m-4"></i>
                    <a href="#!">
                    <div class="mask rgba-white-slight"></div>
                    </a>
                </div> -->
                <div class="card-body">
                    <div class="container-fluid">
                        <h1 class="sub-title mb-3 align-baseline mt-2">Agregar insumos</h1>
                        <form class="align-items-center" style="color: #757575;" action="{{ url("/agregar/insumos/{$ot->idorden_trabajo}") }}" method="POST" class="needs-validation">
                            {!! csrf_field() !!}
                            <input type="hidden" class="form-control" name="idorden" value="{{ $ot->idorden_trabajo }}">
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label for="nombre" class="mt-1 mb-3 box-label">Insumos</label>
                                        <select class="custom-select" name="insumo">
                                            @foreach($insumos as $insumo)
                                            <option value="{{ $insumo->idinsumo }}">{{ $insumo->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label for="hora_inicio" class="mt-2 mb-3 box-label">Cantidad</label>
                                        <input type="number" class="form-control" name="cantidad">
                                    </div>	
                                </div>
                            </div>
                            <div class="md-for m-0 text-right" id="btnformulario">
                                <button type="submit" class="btn cyan white-text" id="btn-aceptar">Agregar <i class="fa fa-paper-plane ml-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <div class="card mt-4">
                <!-- <div class="view overlay text-center align-baseline">
                    <i class="fas fa-user-circle cyan-text mr-1 fa-6x m-4"></i>
                    <a href="#!">
                    <div class="mask rgba-white-slight"></div>
                    </a>
                </div> -->
                <div class="card-body">
                    <div class="container-fluid">
                        <h1 class="sub-title mb-3 align-baseline mt-2">Insumos utilizados</h1>
                        @if($insumos_agregados->count() > 0)
                        <table class="table table-responsive-sm ">
                            <thead>
                                <tr>
                                    <th class="table-title">Insumo</th>
                                    <th class="table-title">Cantidad</th>
                                    <th class="table-title">Precio </th>
                                    <th class="table-title">Costo final </th>
                                    <th class="table-title">Opciones </th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($insumos_agregados as $insumo)
                                    <tr>
                                        <td class="table-text align-baseline">{{ $insumo->nombre }}</td>
                                        <td class="table-text align-baseline">{{ $insumo->cantidad }}</td>
                                        <td class="table-text align-baseline">{{ $insumo->precio}}</td>
                                        <td class="table-text align-baseline">{{ $insumo->precio*$insumo->cantidad}}</td>
                                        <td colspan="5" class="table-text align-baseline">
                                            <a href="{{ url("/eliminar/insumos/{$ot->idorden_trabajo}") }}" class="btn btn-sm danger-color white-text">Eliminar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <blockquote class="blockquote bq-warning">
                                <p class="bq-title">No se han agregado insumos</p>
                                <p>
                                    Despues de realizar su solicitud estas quedan pendientes de su confirmación y que se les asigne personal, fechas y horarios.
                                </p>
                            </blockquote>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card mt-4">
                <!-- <div class="view overlay text-center align-baseline">
                    <i class="fas fa-user-circle cyan-text mr-1 fa-6x m-4"></i>
                    <a href="#!">
                    <div class="mask rgba-white-slight"></div>
                    </a>
                </div> -->
                <div class="card-body">
                    <div class="container-fluid">
                        <h1 class="sub-title mb-3 align-baseline mt-2">Finalizar proceso</h1>
                        <form class="align-items-center" style="color: #757575;" action="{{ url("/finalizar/{$ot->idorden_trabajo}") }}" method="POST" class="needs-validation">
                            {!! csrf_field() !!}
                            <input type="hidden" class="form-control" name="idorden" value="{{ $ot->idorden_trabajo }}">
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label for="observacion" class="mt-1 mb-3 box-label">Observación</label>
                                        <textarea name="observacion" rows="5" class="form-control"></textarea>
                                    </div>

                                </div>
                            </div>
                            <div class="md-for m-0 text-right" id="btnformulario">
                                <button type="submit" class="btn cyan white-text" id="btn-aceptar">Finalizar trabajo <i class="fa fa-paper-plane ml-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    @endif
</div>
@endsection
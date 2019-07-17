@extends('layouts.dashboard')
@section('page-title', 'Perfil de '.Auth::user()->type)
@section('title', 'Mi perfil')
@section('perfil', 'active-item')
@section('contenido')
<div class="col-lg-4 mb-3">
    <div class="card z-depth-0 border rounded">
        <div class="card-body">
            <div class="avatar mx-auto white mb-3 mt-3">
                <img src="http://grantce.net/images/avatar.png" alt="avatar mx-auto white" class="rounded-circle img-fluid z-depth-2">
            </div>
            <div class="user-profile text-center black-text">
                <p class="user-name">
                    {{ Auth::user()->name.' '.Auth::user()->lastname }} <br>
                    <span class="user-type grey-text">{{ Auth::user()->email }}</span>
                </p>
            </div>
            <div class="text-center">
                <form action="{{ route('logout') }}" method="post">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-sm btn-rounded btn-outline-primary waves-effect m-0">Cerrar sesión</button>
                </form>
            </div>
        </div>
        
    </div>
</div>
<div class="col-lg-8 mb-3">
    <div class="card z-depth-0 border">
        <div class="card-body">
            <div class="row mt-2 mr-0 ml-0">
                <div class="col-lg-12 mb-0 text-center">
                    <p class="page-subtitle">Mis datos</p>
                </div>
            </div>
            <div class="row ml-0 mr-0 mt-4 mb-1">
                <div class="col-6 col-lg-3 text-center mb-3">
                    <div>
                        <i class="fas fa-map-marker-alt fa-3x yellow-text mb-2"></i>
                    </div>
                    <p class="card-text black-text"> 
                        <b>Dirección </b> <br>
                        <span class="grey-text">{{ $detalle_usuario->direccion }}</span>
                    </p>
                </div>
                <div class="col-6 col-lg-3 text-center mb-3">
                    <div>
                        <i class="fas fa-phone fa-3x blue-text mb-2"></i>
                    </div>
                    <p class="card-text black-text"> 
                        <b>Telefono</b> <br>
                        <span class="grey-text">{{ $detalle_usuario->telefono }}</span>
                    </p>
                </div>
                <div class="col-6 col-lg-3 text-center mb-3">
                    <div>
                        <i class="fas fa-user-tag fa-3x green-text mb-2"></i>
                    </div>
                    <p class="card-text black-text"> 
                        <b>Tipo cliente</b> <br>
                        <span class="grey-text">{{ $detalle_usuario->tipo_cliente }}</span>
                    </p>
                </div>
                <div class="col-6 col-lg-3 text-center mb-3">
                    <div>
                        <i class="fas fa-id-card fa-3x red-text mb-2"></i>
                    </div>
                    <p class="card-text black-text"> 
                        <b>Rut</b> <br>
                        <span class="grey-text">{{ Auth::user()->rut }}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-4 mb-3">
    <div class="card z-depth-0 border">
        <div class="card-body">
            <div class="row mt-2 mr-0 ml-0">
                <div class="col-lg-12 text-center">
                    <p class="page-subtitle">Seguridad</p>
                </div>
            </div>
            <form method="POST" action="{{ url('/user-profile/nuevo/contraseña') }}">
                {!! csrf_field() !!}
                <div class="form-row">
                    <div class="col-lg-12">
                        <label for="nueva_contraseña" class="box-label grey-text">Nueva contraseña</label>
                        <input name="nueva_contraseña" class="form-control " type="password" >
                    </div>
                    <div class="col-lg-12">
                        <label for="confirmar_contraseña" class="mt-3 box-label grey-text">Confirmar contraseña</label>
                        <input name="confirmar_contraseña" class="form-control " type="password" >
                    </div>
                </div>
                <div class="md-form mb-0 text-center" id="btnformulario">
                    <button type="submit" class="btn cyan white-text btn-sm btn-rounded m-0">Actualizar <i class="fa fa-paper-plane ml-2"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-lg-8 mb-3">
    <div class="card z-depth-0 border">
        <div class="card-body">
            <div class="row mt-2 mr-0 ml-0">
                <div class="col-lg-12 text-center">
                    <p class="page-subtitle">Actualizar correo</p>
                    <p class="card-text ">Nota: Recuerde que al modificar su correo actual este no podrá ser utilizado nuevamente</p>
                </div>
            </div>
            <form method="POST" action="{{ url('/user-profile/nuevo/contraseña') }}">
                {!! csrf_field() !!}
                <div class="form-row">
                    <div class="col-lg-12">
                        <label for="nuevo_correo" class="box-label grey-text">Nuevo correo</label>
                        <input name="nuevo_correo" class="form-control " type="email" >
                    </div>
                </div>
                <div class="md-form mb-0 text-right" id="btnformulario">
                    <button type="submit" class="btn cyan white-text btn-sm btn-rounded m-0">Actualizar <i class="fa fa-paper-plane ml-2"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
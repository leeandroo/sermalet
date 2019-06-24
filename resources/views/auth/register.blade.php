@extends('layouts.main')
@section('titulo', 'Iniciar sesión')
@section('contenido')
    <div class="view" id="fondo">
        <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row" id="centrar">
                    <div class="col-lg-9" id="centrar">
                        <div class="card col-md-9 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="container-fluid" id="centrar">
                                    <div class="card-body">
                                        <div class="card-body">
                                            <form class="align-items-center" style="color: #757575;" action="{{ route('register') }}" method="post">
                                                {!! csrf_field() !!}
                                                <div class="form-row mb-3 mt-3 text-center">
                                                    <div class="col-lg-12">
                                                        <h2 class="font-weight-bold black-text"><i class="fas fa-bolt animated tada infinite "></i> UNETE A NOSOTROS</h2>	
                                                        <p class="text-center grey-text my-0" style="font-size: 15px;">
                                                            Registra tu cuenta de usuario.
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="form-group ml-2 mr-2">
                                                    <div>
                                                        <h6 class="form-title mt-3">Informacion del usuario</h6>
                                                        <input name="tipo_usuario" class="form-control " type="hidden" value="Cliente">
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="col-lg-6 col-6 my-2">
                                                            <!-- <label for="nombre" class="mt-1 box-label">Nombre</label> -->
                                                            <input name="nombre" class="form-control " type="text" placeholder="Nombre">
                                                        </div>
                                                        <div class="col-lg-6 col-6 my-2">
                                                            <!-- <label for="apellido" class="mt-1 box-label">Apellido</label> -->
                                                            <input name="apellido" class="form-control " type="text" placeholder="Apellido">
                                                        </div>
                                                        <div class="col-lg-6 col-6 my-2" >
                                                            <!-- <label for="rut" class="mt-1 box-label">RUT</label> -->
                                                            <input name="rut" class="form-control " type="text" placeholder="RUT">
                                                        </div>
                                                        <div class="col-lg-6 col-6 my-2">
                                                            <!-- <label for="telefono" class="mt-1 box-label">Teléfono</label> -->
                                                            <input name="telefono" class="form-control " type="text" placeholder="Telefono">
                                                        </div>
                                                        <div class="col-lg-12 col-sm-12 my-2">
                                                            <!-- <label for="direccion" class="mt-1 box-label">Dirección</label> -->
                                                            <input name="direccion" class="form-control " type="text" placeholder="Dirección">
                                                        </div>
                                                        <div class="col-lg-12 col-sm-12 my-2" >
                                                            <!-- <label for="correo" class="mt-1 box-label">Tipo de cliente</label> -->
                                                            <select class="custom-select" name="tipo_cliente">
                                                                <option value="" disabled selected>Tipo de cliente</option>
                                                                <option value="Empresa">Empresa</option>
                                                                <option value="Persona natural">Persona natural</option>
                                                            </select>
                                                        </div>	
                                                    </div>
                                                    
                                                </div>

                                                <div class="form-group ml-2 mr-2">
                                                    <div>
                                                        <h6 class="form-title mt-3"> Detalle de la cuenta</h6>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-lg-12 col-sm-12 my-2" >
                                                            <!-- <label for="email" class="mt-1 box-label">Correo</label> -->
                                                            <input name="email" class="form-control " type="email" placeholder="Email">
                                                        </div>
                                                       
                                                        <div class="col-lg-6 col-12 my-2">
                                                            <!-- <label for="contraseña" class="mt-1 box-label">Contraseña</label> -->
                                                            <input name="contraseña" class="form-control " type="password" placeholder="Contraseña">
                                                        </div>
                                                        <div class="col-lg-6 col-12 my-2">
                                                            <!-- <label for="confirmar" class="mt-1 box-label">Confirmar</label> -->
                                                            <input name="confirmar" class="form-control " type="password" placeholder="Confirma Contraseña">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="md-form my-0 text-center" id="btnLogin">
                                                    <button type="submit" class="btn">Registrar cuenta</button>
                                                </div>
											</form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
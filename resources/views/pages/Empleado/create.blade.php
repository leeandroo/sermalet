<div class="card mt-4 ml-2 mr-2">
    <div class="card-body">
        <div class="container-fluid">
            <h1 class="sub-title">Ingresar Nuevo Empleado</h1>
            <form class="align-items-center" style="color: #757575;" action="{{ route('register') }}" method="post">
                {!! csrf_field() !!}
                

                <div class="form-group ml-2 mr-2">
                    <div>
                        
                        <h6 class="form-title mt-3"><b>Informacion del trabajador: </b></h6>
                        <input name="tipo_usuario" class="form-control " type="hidden" value="Trabajador">
                        <input name="tipo_cliente" class="form-control " type="hidden" value="No aplica">
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
                        
                    </div>
                </div>

                <div class="form-group ml-2 mr-2">
                    <div>
                        <h6 class="form-title mt-3"><b>Detalle de la cuenta:</b></h6>
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
                    <button type="submit" class="btn btn-sm cyan white-text">Registrar trabajador</button>
                </div>
            </form>
        </div>
    </div>
</div>
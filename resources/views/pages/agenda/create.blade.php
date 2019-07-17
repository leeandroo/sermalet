<div id="modalCita" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header unique-color">
				<h4 class="modal-title white-text">Agende su cita</h4>
			</div>
			<div class="modal-body">
				<p></p>
				<form class="align-items-center" style="color: #757575;" action="{{ url('/solicitar') }}" method="POST" class="needs-validation">
					{!! csrf_field() !!}
					<div class="form-group">
						<div>
							<h6 class="form-title mt-3">Informacion del solicitante</h6>
						</div>

						<div class="form-row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<label for="nombre" class="mt-1 mb-3 box-label">Tipo de servicio</label>
								<select class="browser-default custom-select" name="servicio">
									<option value="Mantención de equipos">Mantención de equipos</option>
									<option value="Mantención de vehículos">Mantención de vehículos</option>
									<option value="Equipamiento minero">Equipamiento minero</option>
									<option value="Instalación de alarmas">Instalación de alarmas</option>
									<option value="Instalación de cámaras">Instalación de cámaras</option>
									<option value="Cotizaciones">Cotizaciones</option>
									<option value="Automatización de vivienda">Automatización de vivienda</option>
									<option value="Otro">Otro</option>
								</select>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-3">
								<label for="name">Descripción</label>
								<textarea name="descripcion" class="form-control rounded-0" type="text" rows="4"></textarea>
								<div class="custom-control custom-checkbox my-4 text-left">
									<input type="checkbox" class="custom-control-input" id="estadowsp" name="estadowsp">
									<label class="custom-control-label grey-text w-responsive" for="estadowsp" id="relawayLight">¿Desea que nos comuniquemos a través de Whatsapp?</label>
								</div>
							</div>	
						</div>
					</div>
					<div class="md-for mt-5 mb-3 text-right" id="btnformulario">
						<button type="submit" class="btn btn-sm btn-rounded unique-color white-text" id="btn-aceptar">Enviar <i class="fa fa-paper-plane ml-2"></i></button>
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>
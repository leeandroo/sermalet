<div id="modal-{{$cita->idcita}}" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header info-color">
				<h4 class="modal-title white-text">Agendar cita</h4>
			</div>
			<div class="modal-body">
				<form class="align-items-center" style="color: #757575;" action="{{ url("/agendar/{$cita->idcita}") }}" method="POST" class="needs-validation">
					{!! csrf_field() !!}
					
					<div class="form-group">
						<div>
							<h6 class="form-title mt-3">Asignar recursos</h6>
						</div>
						
						<div class="form-row">
							
							<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 mt-3 ">
								<label for="fecha" class="mt-1 mb-3 box-label">Fecha</label>
								<input type="text" class="form-control" id="datepicker" name="fecha">
							</div>
							<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 mt-3">
								<label for="fecha" class="mt-1 mb-3 box-label">Horario de atención</label>
								<input type="time" class="form-control" name="hora_inicio">
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-3">
								<label for="fecha" class="mt-1 mb-3 box-label">Responsable</label>
								<select class="custom-select" name="responsable">
									<option value="" disabled selected>Seleccione responsable</option>
									@foreach($trabajadores as $trabajador)
										<option value="{{ $trabajador->iduser }}">{{ $trabajador->name.' '.$trabajador->lastname }}</option>
									@endforeach
								</select>
							</div>		
						</div>
					</div>
					<div class="md-for mt-5 mb-3 text-right" id="btnformulario">
						<button type="button" class="btn btn-sm white info-text" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-sm cyan white-text">Agendar</button>
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>
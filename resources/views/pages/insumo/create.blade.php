@extends('layouts.dashboard')
@section('titulo', 'Ingresa un Insumo')
@section('contenido')

<div class="row" style="padding-bottom: 2em;">
    <div class="col-lg-12 col-md-8 col-sm-12 col-xs-12">
		<div class="card mt-4 ml-2 mr-2">
			<div class="card-body">
				<div class="container-fluid">
					<h1 class="sub-title my-2">Ingresa nuevo insumo</h1>
					<form method="POST" action="{{ url('/admin-profile/agregar') }}">
						{!! csrf_field() !!}
						<div class="form-group">
						<div class="form-row">
									<div class="col-lg-6 col-6 ">
										<label for="nombre" class="mt-3 box-label grey-text">Nombre</label>
										<input name="nombre" value="{{ old('nombre') }}" class="form-control " type="text" >
									</div>
									<div class="col-lg-6 col-6 ">
										<label for="categoria" class="mt-3 box-label grey-text">Categoria</label>
										<select class="custom-select" name="categoria">											
											@foreach ($categorias as $categoria) 
												<option value="{{ $categoria->idcategoria }}">{{ $categoria->nombre }}</option>                        
											@endforeach
										</select> 
									</div>
									<div class="col-lg-4 col-6 ">
										<label for="stock" class="mt-3 box-label grey-text">Stock</label>
										<input name="stock" value="{{ old('stock') }}" class="form-control " type="number" >
									</div>
									<div class="col-lg-4 col-6 ">
										<label for="precio" class="mt-3 box-label grey-text">Precio</label>
										<input name="precio" value="{{ old('stock') }}" class="form-control " type="number" >
									</div>
									<div class="col-lg-4 col-12" >
										<label for="codigo" class="mt-3 box-label grey-text">Código</label>
										<input name="codigo" value="{{ old('codigo') }}" class="form-control " type="text" >
									</div>
									<div class="col-lg-12 col-sm-12">
										<label for="descripcion" class="mt-3 box-label grey-text">Descripción</label>
										<textarea name="descripcion" class="form-control" id="exampleFormControlTextarea1" rows="4">{{ old('descripcion') }}</textarea>
									</div>
								</div>
						</div>
						<div class="md-form my-0 text-right" id="btnformulario">
							<button type="submit" class="btn green white-text" id="btn-aceptar">Ingresar <i class="fa fa-paper-plane ml-2"></i></button>
							<button type="reset" class="btn red white-text" id="btn-cancelar">Cancelar <i class="fas fa-times ml-2"></i></button>
						</div>
					</form>
			</div>
		</div>
	</div>
</div>






@endsection 
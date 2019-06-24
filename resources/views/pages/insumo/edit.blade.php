@extends('layouts.dashboard')
@section('titulo', 'Editar Insumo')
@section('contenido')

<div class="row" style="padding-bottom: 2em;">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card mt-4 ml-2 mr-2">
            <div class="card-body">
                <div class="container-fluid">
                    <h1 class="sub-title my-4">Editar Insumo: {{ $insumo->nombre }}</h1>


                    <form method="POST" action="{{ url("insumo/{$insumo->idinsumo}") }}">
                        {{ method_field('PUT') }}
                        
                        {!! csrf_field() !!}
						<div class="form-group">
						<div class="form-row">
									<div class="col-lg-6 col-6 ">
										<label for="nombre" class="mt-1 box-label grey-text">Nombre</label>
										<input name="nombre" value="{{ old('nombre', $insumo->nombre) }}" class="form-control " type="text" >
									</div>
									<div class="col-lg-6 col-6 ">
										<label for="categoria" class="mt-1 box-label grey-text">Categoria</label>


                                        <select class="custom-select" name="categoria">                                            
                                            @foreach ($categorias as $categoria) 
                                                
                                                @if ( $categoria->idcategoria == $insumo->idcategoria )
                                                    <option value="{{ $categoria->idcategoria }}" selected>{{ $categoria->nombre }}</option>                        
                                                @else
                                                    <option value="{{ $categoria->idcategoria }}">{{ $categoria->nombre }}</option>                        
                                                @endif  
                                                
                                            @endforeach
                                        </select>  



									</div>
					
									
									<div class="col-lg-4 col-6 ">
										<label for="stock" class="mt-1 box-label grey-text">Stock</label>
										<input name="stock" value="{{ old('stock', $insumo->stock) }}" class="form-control " type="text" >
									</div>

									<div class="col-lg-4 col-6 ">
										<label for="stock" class="mt-1 box-label grey-text">Precio</label>
										<input name="precio" value="{{ old('precio', $insumo->precio) }}" class="form-control " type="number" >
									</div>
									
									<div class="col-lg-4 col-12" >
										<label for="codigo" class="mt-1 box-label grey-text">Codigo</label>
										<input name="codigo" value="{{ old('codigo', $insumo->codigo) }}" class="form-control " type="text" >
									</div>
									<div class="col-lg-12 col-sm-12">
										<label for="descripcion" class="mt-1 box-label grey-text">Descripción</label>
										<textarea name="descripcion" class="form-control" id="exampleFormControlTextarea1" rows="4">{{ old('descripcion', $insumo->descripcion) }}</textarea>
									</div>
								</div>
						</div>
						<div class="md-form my-0 text-right" id="btnformulario">
                            <button type="submit" class="btn green white-text" id="btn-aceptar">Actualizar <i class="fa fa-paper-plane ml-2"></i></button>
                            <button type="reset" class="btn red white-text" id="btn-cancelar">Cancelar <i class="fas fa-times ml-2"></i></button>
						</div>
					</form>






                </div>
            </div>
        </div>
    </div>
</div>

@endsection 
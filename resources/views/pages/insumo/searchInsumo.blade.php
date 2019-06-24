<form action="{{ url('/admin-profile/insumo') }}" autocomplete="off" method="PATCH" role="search" >

    <div class="form-group my-0 mt-2 ">
        <div class="form-row">

        </div>
        <div class="form-row float-right"> 
            
            <div class="col-lg-5 my-2">
                <select class="custom-select" name="categoria">
                    <option value="">--Selecciona una Categoria--</option>
                    @foreach ($categorias as $categoria) 
                        
                        @if ( $categoria->idcategoria == $categoriaid )
                            <option value="{{ $categoria->idcategoria }}" selected>{{ $categoria->nombre }}</option>                        
                        @else
                            <option value="{{ $categoria->idcategoria }}">{{ $categoria->nombre }}</option>                        
                        @endif  
                        
                    @endforeach
                </select>               
            </div>

            <div class="col-lg-5 my-2">            
                <input name="nombre" class="form-control " type="text" placeholder="nombre" value="{{ $nombre }}">
            </div>

            <div class="col-lg-1 my-2 mr-4">            
                <button type="submit" class="btn btn-primary btn-md m-0">Buscar</button>
            </div>

            
        </div>
    </div>

</form>









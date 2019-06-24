<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    protected $table = "insumo";
    protected $primaryKey = "idinsumo";    
    public $timestamps = false;
    

    protected $fillable =[
        'idinsumo',
        'idcategoria',
        'codigo',
        'nombre',
        'stock',
        'descripcion',
        'estado',
        'precio'
    ];

    protected $guarded =[

    ];

    //scope

    public function scopeCategoria($query, $categoria){
        
        if($categoria){
            return $query->where('idcategoria', 'LIKE', "%$categoria%");
        }
    }
    public function scopeNombre($query, $nombre){
        
        if($nombre){
            return $query->where('nombre', 'LIKE', "%$nombre%");
        }
    }

}

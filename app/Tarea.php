<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table = "tarea";
    protected $primaryKey = "idtarea";
    protected $foreignKey = "idorden_trabajo";
    public $timestamps = false;

    protected $fillable =[
        'idorden_trabajo',
        'nombre',
        'descripcion',
        'estado'
    ];

    protected $guarded =[

    ];
}

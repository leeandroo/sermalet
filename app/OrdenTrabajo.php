<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenTrabajo extends Model
{
    protected $table = "orden_trabajo";
    protected $primaryKey = "idorden_trabajo";
    public $timestamps = false;
    public $insumos;
    public $tareas;
    public $cita;
    public $user;
    
    protected $fillable =[
    	'idcita',
        'idempleado',
        'hora_inicio',
        'fecha',
        'precio',
        'estado'
    ];

    protected $guarded =[

    ];
}

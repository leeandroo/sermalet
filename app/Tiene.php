<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tiene extends Model
{
    protected $table = "tiene";
    protected $primaryKey = "idtiene";
    public $timestamps = false;

    protected $fillable =[
        'idorden_trabajo',
        'idinsumo',
        'cantidad'
    ];

    protected $guarded =[

    ];
}

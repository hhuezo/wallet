<?php

namespace App\catalogo;

use Illuminate\Database\Eloquent\Model;

class Agrupacion extends Model
{
    protected $table='almacen_agrupacion';

    protected $primaryKey='Id';

    public $timestamps=false;


    protected $fillable =[
        'Nombre',
        'Codigo',
    	'Activo'
    ];

    protected $guarded =[

    ];
}

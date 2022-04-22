<?php

namespace App\catalogo;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    protected $table='banco';

    protected $primaryKey='Id';

    public $timestamps=false;


    protected $fillable =[
        'Nombre',
    	'Activo'
    ];

    protected $guarded =[

    ];
}

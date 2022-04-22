<?php

namespace App\catalogo;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $table='wallet';

    protected $primaryKey='Id';

    public $timestamps=false;


    protected $fillable =[
        'Nombre',
    	'Activo'
    ];

    protected $guarded =[

    ];
}

<?php

namespace App\catalogo;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table='persona';

    protected $primaryKey='Id';

    public $timestamps=false;


    protected $fillable =[
        'Usuario',
    	'Dui',
    	'Cuenta',
    	'Banco'
    ];

    protected $guarded =[

    ];

    public function banco()
    {
        return $this->belongsTo('App\catalogo\Banco', 'Banco', 'Id');
    }

    public function usuario()
    {
        return $this->belongsTo('App\User', 'Usuario', 'id');
    }
}

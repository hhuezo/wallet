<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $primaryKey = 'id';

    public $timestamps = false;


    protected $fillable = [
        'name',
        'guard_name'
    ];

    protected $guarded = [];

    public function role_users()
    {
        return $this->belongsToMany('App\User','model_has_roles','role_id','model_id');
    }

    public function rolePermissions()
    {
        return $this->belongsToMany('App\Permission','role_has_permissions','role_id');
    }
}

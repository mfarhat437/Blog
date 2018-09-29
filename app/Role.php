<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table='roles';
    public function user(){
        return $this->belongstomany('App\User','user_role','role_id','user_id');
    }
}

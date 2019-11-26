<?php

namespace App\Modules\Backend\Role;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'nama',
    ];

    public function permissions()
    {
    	return $this->BelongsToMany('App\Permission');
    }
}

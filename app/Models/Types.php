<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    protected $table = 'types';

    protected $fillable = [
        'id','department_id','name','status'
    ];

    public function departaments()
    {
    	return $this->belongsTo('App\Models\Departaments', 'department_id');
    }

}

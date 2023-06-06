<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaints extends Model
{

    protected $table = 'complaints';

    protected $fillable = [
        'id','code','name','phone','identification','user_id','type_id','department_id','anonymous','description','region','province','municipality','address','priority','status','reason','file'
    ];

    public function user()
    {
    	return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function department()
    {
    	return $this->belongsTo('App\Models\Departaments', 'department_id');
    }

    public function type()
    {
    	return $this->belongsTo('App\Models\Types', 'type_id');
    }

}

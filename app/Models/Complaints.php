<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaints extends Model
{

    protected $table = 'complaints';

    protected $fillable = [
        'id','code','identification','user_id','type','departments','anonymous','description','region','province','municipality','address','priority','status','file'
    ];

    public function user()
    {
    	return $this->belongsTo('App\Models\User', 'user_id');
    }

}

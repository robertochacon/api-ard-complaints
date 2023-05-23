<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaints extends Model
{

    protected $table = 'complaints';

    protected $fillable = [
        'id','code','identification','user_id','type','departments','anonymous','description','region','province','municipality','address','priority','status','file'
    ];

}

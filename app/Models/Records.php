<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Records extends Model
{
    protected $table = 'records';

    protected $fillable = [
        'id','complaint_id','user_id','status'
    ];

    public function complaint()
    {
    	return $this->belongsTo('App\Models\Complaints', 'complaint_id');
    }

    public function user()
    {
    	return $this->belongsTo('App\Models\User', 'user_id');
    }

}

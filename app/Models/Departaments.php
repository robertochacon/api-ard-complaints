<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departaments extends Model
{
    protected $table = 'departments';

    protected $fillable = [
        'id','name','status'
    ];
}

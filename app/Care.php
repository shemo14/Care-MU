<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Care extends Model
{
    protected $table = 'care';
    protected $fillable = ['name','hospital'];
}

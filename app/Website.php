<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    protected $table = 'website';

    protected $fillable = ['title','phone','address','mail','desc'];
}

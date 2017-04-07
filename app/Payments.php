<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $table = 'payment';

    protected $fillable = ['month' , 'user_id'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tables extends Model
{
    protected $table = 'table';

    protected $fillable = [
        'day', 'go', 'come', 'user_id'
    ];
}

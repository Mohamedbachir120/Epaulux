<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class equipe extends Model
{
    //

    protected $casts = [
        'players' => 'array'
    ];
}

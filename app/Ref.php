<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ref extends Model
{
 
public function  products(){
    return $this->belongsToMany(Products::class);
}

public function commandes(){

return $this->belongsToMany(Commande::class);	
}


    //
}

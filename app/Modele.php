<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Products;
use App\Commande;

class Modele extends Model
{
    //
public function products(){
    return $this->belongsToMany(Products::class);
}

public function commandes(){

return $this->belongsToMany(Commande::class);	
}

 
}

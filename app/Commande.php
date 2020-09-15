<?php

namespace App;
use App\Products;
use Illuminate\Database\Eloquent\Model;
use App\Modele;
use App\Ref;

class Commande extends Model
{
    //
    public function refs(){

    	return $this->belongsToMany(Ref::class); 

    }

    public function modeles(){

    	return $this->belongsToMany(Modele::class); 

    }

    public function user(){

    	return $this->belongsTo(User::class); 

    }

public function products(){

    	return $this->belongsTo(Products::class); 

    }
    
    
}
